<?php

namespace App\Services;

class GuestbookFormer
{
    public function formGuestbook() {
        $file = fopen(getcwd().'/App/Services/guestbook.imc', 'r');

        $result = [];

        while ($str = fgets($file)) {
            $guestInfo = explode(';', $str);

            $result[] = [
                'name' => $guestInfo[0],
                'email' => $guestInfo[1],
                'comment' => $guestInfo[2],
                'date' => $guestInfo[3]
            ];
        }

        fclose($file);

        return $this->array_sort($result, 'date', SORT_DESC);
    }

    public function addToGuestbook() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $file = fopen(getcwd().'/App/Services/guestbook.imc', 'a');

            $toWrite = $_POST['name'].';'.$_POST['email'].';'.$_POST['comment'].';'.date('d/m/Y H:i:s')."\r\n";

            fwrite($file, $toWrite);
            fclose($file);
        }
    }

    public function uploadGuestbook() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $source = $_FILES['guestbook']['tmp_name'];
            $dest = getcwd().'/App/Services/guestbook.imc';

            if (!move_uploaded_file($source, $dest)) {
                return false;
            }

            return true;
        }

        return false;
    }

    private function array_sort($array, $on, $order=SORT_ASC)
    {
        $new_array = array();
        $sortable_array = array();

        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }

            switch ($order) {
                case SORT_ASC:
                        asort($sortable_array);
                        break;
                case SORT_DESC:
                        arsort($sortable_array);
                        break;
                }

            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }

        return $new_array;
    }
}
