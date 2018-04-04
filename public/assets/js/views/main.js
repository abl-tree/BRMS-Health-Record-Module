$(function(){
  'use strict';

  $('.breadcrumb').html('<li class="breadcrumb-item active">Dashboard</li>');  
  
  $.get('/data/resident', 'json', function(result){
    var population = result.count.population;
    var male = result.count.male;
    var female = result.count.female;
    var undefinedPop = result.count.undefined;

    $('.population-count').text(population);
    $('span.male-population-rate').text((male/population*100).toFixed(2) + '%');
    $('div.male-population-rate').css('width', (male/population*100).toFixed(2) + '%');
    $('span.female-population-rate').text((female/population).toFixed(2)*100 + '%');
    $('div.female-population-rate').css('width', (female/population.toFixed(2))*100 + '%');
    $('span.undefined-population-rate').text((undefinedPop/population).toFixed(2)*100 + '%');
    $('div.undefined-population-rate').css('width', (undefinedPop/population).toFixed(2)*100 + '%');
  });
  
});
