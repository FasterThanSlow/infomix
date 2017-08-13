<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->title = 'Статистика';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <h2><?= $this->title; ?></h2>
    <div class="container-fluid">
        <h3>Количество вакансий: <?= $countVacancies; ?></h3>
    </div>
    <div class="container-fluid">
        <h3>Количество резюме: <?= $countSummaries; ?></h3>
    </div>
    <div class="container-fluid">
        <h3>Количество работодателей: <?= $countEmployer; ?></h3>
    </div>
    <div class="container-fluid">
        <h3>Количество соискателей: <?= $countCompetitor; ?></h3>
    </div>
</div>
