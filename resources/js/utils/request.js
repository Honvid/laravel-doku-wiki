import axios from 'axios';

axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
Vue.prototype.$axios = axios;

export default {
  name: 'request',

  get(url, params) {
    return this.$axios.get(url).then(res => {
      // alert("请求成功，response=" + res.data);
      // data = res.data;
      console.log(res.data.navList);
    });
  }
}