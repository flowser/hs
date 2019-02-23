
//admin module

const state = {
    admins:[],
  };
const getters = {
    Admins(state){
      return state.admins;
    }
  };
const actions = {
    admins(context){//permission.index route laravel
      axios.get('/orgadmin/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('admins', response.data.admins);
      });
    }
  }
const mutations = {
    admins(state, data){
      return state.admins = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};


