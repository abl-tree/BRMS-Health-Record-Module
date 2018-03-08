$(function(){
  'use strict';
  
  $.get('/data/webapi/resident', 'json', function(data){
    var population = data.count.population;
    var male = data.count.male;
    var female = data.count.female;
    var undefinedPop = data.count.undefined;

    $('.population-count').text(population);
    $('span.male-population-rate').text((male/population*100).toFixed(2) + '%');
    $('div.male-population-rate').css('width', (male/population*100).toFixed(2) + '%');
    $('span.female-population-rate').text((female/population).toFixed(2)*100 + '%');
    $('div.female-population-rate').css('width', (female/population.toFixed(2))*100 + '%');
    $('span.undefined-population-rate').text((undefinedPop/population).toFixed(2)*100 + '%');
    $('div.undefined-population-rate').css('width', (undefinedPop/population).toFixed(2)*100 + '%');
  });
  
});
