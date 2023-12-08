<?php



namespace Solenoid\DateTime;



class Timestamp
{
    public int $value;



    # Returns [self]
    public function __construct (?int $value = null)
    {
        // (Getting the value)
        $this->value = $value === null ? time() : $value;
    }

    # Returns [Timestamp]
    public static function select (?int $value = null)
    {
        // Returning the value
        return new Timestamp( $value );
    }



    # Returns [array<string>] | Throws [Exception]
    public static function get_periods (Timestamp $start, Timestamp $end)
    {
        // (Setting the value)
        $period_list = [];



        // (Getting the value)
        $timestamp = $start->value;

        // Appending the value
        $period_list[] = date( 'Y-m', $timestamp );



        while ( ( $timestamp = strtotime('+1 month', $timestamp) ) <= $end->value )
        {// Processing each entry
            // Appending the value
            $period_list[] = date( 'Y-m', $timestamp );
        }



        // Returning the value
        return $period_list;
    }



    # Returns [string]
    public function __toString ()
    {
        // Returning the value
        return (string) $this->value;
    }
}



?>