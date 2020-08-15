import Vue from 'vue'
import moment from 'moment';

//filter for schowing data time with this form
Vue.filter('ourTime', function(created){
    return moment(created).format('MMMM Do YYYY');
  });

//filter for substring a string
Vue.filter('miniCaraters', function (created) {
    return created.substr(0,40)+'...';
});

