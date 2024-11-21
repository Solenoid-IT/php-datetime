<?php



namespace Solenoid\DateTime;



class TimeRange
{
    const WORKING_DAYS = [ 0, 1, 2, 3, 4 ];
    const FESTIVE_DAYS = [ 5, 6 ];



    public string $week_day;
    public string $start_time;
    public string $end_time;



    # Returns [self]
    public function __construct (string $week_day = 'any', ?string $start_time = null, ?string $end_time = null)
    {
        // (Getting the values)
        $this->week_day   = $week_day;
        $this->start_time = $start_time;
        $this->end_time   = $end_time;
    }



    # Returns [TimeRange|false]
    public static function match (int $timestamp, array $ranges)
    {
        // (Getting the values)
        $weekday = date( 'w', $timestamp );
        $hms     = date( 'H:i:s', $timestamp );



        // (Setting the value)
        $result = false;

        foreach ( $ranges as $range )
        {// Processing each entry
            // (Getting the values)
            $range->start_time = $range->start_time ?? '00:00:00';
            $range->end_time   = $range->end_time ?? '23:59:59';

            if ( $range->week_day === 'any' )
            {// Match OK
                if ( $hms >= $range->start_time && $hms <= $range->end_time )
                {// (Time is within the range)
                    // (Getting the value)
                    $result = $range;

                    // Breaking the iteration
                    break;
                }
            }
            else
            if ( $range->week_day === 'working_day' )
            {// Match OK
                if ( in_array( $weekday, self::WORKING_DAYS ) )
                {// Match OK
                    if ( $hms >= $range->start_time && $hms <= $range->end_time )
                    {// (Time is within the range)
                        // (Getting the value)
                        $result = $range;

                        // Breaking the iteration
                        break;
                    }
                }
            }
            else
            if ( $range->week_day === 'festive_day' )
            {// Match OK
                if ( in_array( $weekday, self::FESTIVE_DAYS ) )
                {// Match OK
                    if ( $hms >= $range->start_time && $hms <= $range->end_time )
                    {// (Time is within the range)
                        // (Getting the value)
                        $result = $range;

                        // Breaking the iteration
                        break;
                    }
                }
            }
            else
            {// Match failed
                if ( $range->week_day === $weekday )
                {// Match failed
                    if ( $hms >= $range->start_time && $hms <= $range->end_time )
                    {// (Time is within the range)
                        // (Getting the value)
                        $result = $range;

                        // Breaking the iteration
                        break;
                    }
                }
            }
        }



        // Returning the value
        return $result;
    }
}



?>