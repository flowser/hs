
//bureauadmin module

const state = {
    bureauadmins:[],
  };
const getters = {
    Bureauadmins(state){
      return state.bureauadmins;
    }
  };
const actions = {
    bureauadmins(context){//permission.index route laravel
      axios.get('/bureauadmin/get')
      .then((response)=>{
        // console.log(response.data.bureauadmins)
        context.commit('bureauadmins', response.data.bureauadmins);
      });
    }
  }
const mutations = {
    bureauadmins(state, data){
      return state.bureauadmins = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};




