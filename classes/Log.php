<?php
class Log
{

  public static function writeCSV($e) {
    $date = new DateTime();
    // Définition du fuseau horaire.
    $date -> setTimezone(new DateTimeZone('Europe/Paris'));

    $log = array(
      "Date" => $date -> format('Y-m-d h:i:s'),
      "Message" => $e -> getMessage()
    );
    $log_file = fopen("./logs/logs_".$date -> format ('d-m-y') . ".csv", "a+");
    fputcsv($log_file, $log, ",");
    fclose($log_file);
  }
}
