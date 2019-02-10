
import moment from 'moment';
import Vue from 'vue';
Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1);
 });

 Vue.filter('dateformat', function(created){
   return moment(created).format('MMM Do YYYY');
 });

 Vue.filter('sortlength', function(text, length,suffix){
   return text.substring(0,length)+suffix;
 })
