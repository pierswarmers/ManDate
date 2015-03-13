<?php


namespace ManDate\Rule;

abstract class SunlightRuleBase
{
    public function getSunrise(\DateTime $dateTime)
    {
        return $this->getChangeTime($dateTime, 'date_sunrise');
    }

    public function getSunset(\DateTime $dateTime)
    {
        return $this->getChangeTime($dateTime, 'date_sunset');
    }

    /**
     *
     * Possible bug was also detected: date_sunrise() seems to return date of the previous day:
     * https://bugs.php.net/bug.php?id=53148
     *
     * To avoid issues, only compare day agnostic formats:  $dt->format('Hi')
     *
     * @param \DateTime $dateTime
     * @param $method
     *
     * @return \DateTime
     */
    private function getChangeTime(\DateTime $dateTime, $method)
    {
        $location = $dateTime->getTimezone()->getLocation();

        $horizonShift = new \DateTime('now', $dateTime->getTimezone());

        $horizonShift->setTimestamp(
            $method(
                $dateTime->getTimestamp(),
                SUNFUNCS_RET_TIMESTAMP,
                $location['latitude'],
                $location['longitude'],
                ini_get("date.sunrise_zenith"),
                $dateTime->getOffset() / 3600
            )
        );

        return $horizonShift;
    }
}
