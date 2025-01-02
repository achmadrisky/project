<?php
function dijkstra($graph, $start, $end) {
    $distances = [];
    $previous = [];
    $queue = [];

    foreach ($graph as $vertex => $edges) {
        $distances[$vertex] = ($vertex === $start) ? 0 : PHP_INT_MAX;
        $previous[$vertex] = null;
        $queue[$vertex] = $distances[$vertex];
    }

    while (!empty($queue)) {
        asort($queue);
        $current = key($queue);
        unset($queue[$current]);

        if ($current === $end) {
            break;
        }

        foreach ($graph[$current] as $neighbor => $cost) {
            $alt = $distances[$current] + $cost;
            if ($alt < $distances[$neighbor]) {
                $distances[$neighbor] = $alt;
                $previous[$neighbor] = $current;
                $queue[$neighbor] = $alt;
            }
        }
    }

    $path = [];
    $current = $end;
    while ($current !== null) {
        array_unshift($path, $current);
        $current = $previous[$current];
    }

    return ['distance' => $distances[$end], 'path' => $path];
}
