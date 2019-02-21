
//bureaudirector module

const state = {
    bureaudirectors:[],
  };
const getters = {
    Bureaudirectors(state){
      return state.bureaudirectors;
    }
  };
const actions = {
    bureaudirectors(context){//permission.index route laravel
      axios.get('/bureaudirector/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('bureaudirectors', response.data.bureaudirectors);
      });
    }
  }
const mutations = {
    bureaudirectors(state, data){
      return state.bureaudirectors = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};



