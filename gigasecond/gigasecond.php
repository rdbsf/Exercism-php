<?php

function from($date)
{
    $dateFuture = clone $date;
    $dateFuture->add(new DateInterval('PT1000000000S'));
    return $dateFuture;
}