/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $('#trigger').waypoint(function (event, direction) {
        console.log('triggered');
        $('.navbar-brand').toggleClass('hide');
        $('.navbar').toggleClass('shrink');
    });
});
