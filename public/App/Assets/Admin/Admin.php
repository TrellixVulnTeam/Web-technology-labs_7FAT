<body>
<?php
    if (!is_null($data)) {
        foreach ($data as $userData) {
            ?>
        <table>
            <tr>
                <td>visit</td>
                <td>ip</td>
                <td>hostname</td>
                <td>browser</td>
                <td>page</td>
            </tr>
            <?php
                echo '<tr>';
                echo '<td>'.$userData->getVisitDate().'</td>';
                echo '<td>'.$userData->getIpAddress().'</td>';
                echo '<td>'.$userData->getHostName().'</td>';
                echo '<td>'.$userData->getBrowserName().'</td>';
                echo '<td>'.$userData->getWebpageAddress().'</td>';
                echo '</tr>';
            ?>
        </table>
        }
    }
<?php
        }
    }
?>
</body>
