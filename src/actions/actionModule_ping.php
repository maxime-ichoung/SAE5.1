<?php
function validateNomDomaine($nom_de_domaine) {
    return preg_match("/^((?!-)[A-Za-z0-9-]{1,63}(?<!-)\.)+[A-Za-z]{2,6}$/", $nom_de_domaine);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $address = $_POST['address'];
    $count = intval($_POST['count']);

    if ($count > 10) {
        $count = 10;
    } elseif ($count < 1) {
        $count = 1;
    }

    // Validation si non valider on exit
    if (!filter_var($ip, FILTER_VALIDATE_IP) && !validateNomDomaine($address)) {
        echo "IP ou adresse invalide. Veuillez saisir une IP ou adresse valide !";
    } else {
        // Ping
        $output = shell_exec("ping -c ".$count." ".$address);

        // Traitement du résultat
        $lines = explode("\n", $output);
        $pingStatistics = [];
        $rttStats = [];
        
        foreach ($lines as $line) {
            if (preg_match("/(\d+) packets transmitted, (\d+) received, (\d+)% packet loss, time (\d+)ms/", $line, $matches)) {
                $pingStatistics = [
                    'packets_transmitted' => $matches[1],
                    'packets_received' => $matches[2],
                    'packet_loss' => $matches[3],
                    'time' => $matches[4]
                ];
            }

            if (preg_match("/rtt min\/avg\/max\/mdev = ([\d\.]+)\/([\d\.]+)\/([\d\.]+)\/([\d\.]+) ms/", $line, $matches)) {
                $rttStats = [
                    'min' => $matches[1],
                    'avg' => $matches[2],
                    'max' => $matches[3],
                    'mdev' => $matches[4]
                ];
            }
        }
        
        $htmlOutput = "<h3>Statistiques Ping</h3>";
        $htmlOutput .= "<table class=\"table\">";
            $htmlOutput .= "<tr><th>Paquets transmis</th><td>" . $pingStatistics['packets_transmitted'] . "</td></tr>";
            $htmlOutput .= "<tr><th>Paquets reçus</th><td>" . $pingStatistics['packets_received'] . "</td></tr>";
            $htmlOutput .= "<tr><th>Perte de paquets</th><td>" . $pingStatistics['packet_loss'] . "%</td></tr>";
            $htmlOutput .= "<tr><th>Temps</th><td>" . $pingStatistics['time'] . " ms</td></tr>";
        $htmlOutput .= "</table>";
        
        $htmlOutput .= "<h3>Statistiques RTT</h3>";
        $htmlOutput .= "<table class=\"table\">";
            $htmlOutput .= "<tr><th>Min</th><td>" . $rttStats['min'] . " ms</td></tr>";
            $htmlOutput .= "<tr><th>Moyenne</th><td>" . $rttStats['avg'] . " ms</td></tr>";
            $htmlOutput .= "<tr><th>Max</th><td>" . $rttStats['max'] . " ms</td></tr>";
            $htmlOutput .= "<tr><th>Mdev</th><td>" . $rttStats['mdev'];
        $htmlOutput .= "</table>";
        
        echo $htmlOutput;
        
    }
}