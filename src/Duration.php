<?php



namespace Solenoid\DateTime;



class Duration
{
    public int $seconds;



    # Returns [self]
    public function __construct (int $seconds)
    {
        // (Getting the value)
        $this->seconds = $seconds;
    }

    # Returns [Duration]
    public static function create (int $seconds)
    {
        // Returning the value
        return new Duration( $seconds );
    }



    # Returns [assoc]
    public function parse ()
    {
        // Returning the value
        return
            [
                'D' => floor( $this->seconds / (24 * 60 * 60) ),

                'H' => floor( ($this->seconds % (24 * 60 * 60) ) / (60 * 60) ),
                'M' => floor( ($this->seconds % (60 * 60)) / (60) ),
                'S' => floor( $this->seconds % 60 )
            ]
        ;
    }



    # Returns [string]
    public function __toString ()
    {
        // Returning the value
        return (string) $this->seconds;
    }
}



?>