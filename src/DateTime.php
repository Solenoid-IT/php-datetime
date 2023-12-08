<?php



namespace Solenoid\DateTime;



class DateTime
{
    public string $value;



    # Returns [self]
    public function __construct (string $value)
    {
        // (Getting the value)
        $this->value = $value;
    }

    # Returns [DateTime]
    public static function create (string $value)
    {
        // Returning the value
        return new DateTime( $value );
    }



    # Returns [string]
    public function convert (?string $timezone = null, ?string $format = null)
    {
        if ( $timezone === null ) $timezone = date_default_timezone_get();
        if ( $format === null) $format = \DateTime::ATOM;



        // (Getting the values)
        $dt = new \DateTime( $this->value );
        $tz = new \DateTimeZone( $timezone );



        // (Setting the value)
        $dt->setTimezone( $tz );



        // Returning the value
        return $dt->format( $format );
    }



    # Returns [string]
    public function __toString ()
    {
        // Returning the value
        return $this->value;
    }
}



?>