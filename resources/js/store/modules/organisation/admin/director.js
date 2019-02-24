
//bureaudirector module

const state = {
    bureaudirectors:[],
    bureaudirector:[],
  };
const getters = {
    Bureaudirectors(state){
      return state.bureaudirectors;
    },
    Bureaudirector(state){
      return state.bureaudirector;
    }
  };
const actions = {
    bureaudirectors(context){//permission.index route laravel
      axios.get('/bureaudirector/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('bureaudirectors', response.data.bureaudirectors);
      });
    },
    BureauDirectorById(context, payload){
        axios.get('/bureaudirector/show/'+payload)
              .then((response)=>{
                  console.log(response.data);
                  context.commit('bureaudirector', response.data.bureaudirector);
              });
  }
}
const mutations = {
    bureaudirectors(state, data){
      return state.bureaudirectors = data;
    },
    bureaudirector(state, data){
      return state.bureaudirector = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};



