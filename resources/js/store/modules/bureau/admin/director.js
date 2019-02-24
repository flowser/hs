
//specificbureaudirector module

const state = {
    specificbureaudirectors:[],
    specificbureaudirector:[],
  };
const getters = {
    Specificbureaudirectors(state){
      return state.specificbureaudirectors;
    },
    Specificbureaudirector(state){
      return state.specificbureaudirector;
    }
  };
const actions = {
    specificbureaudirectors(context){//permission.index route laravel
      axios.get('/specificbureaudirector/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('specificbureaudirectors', response.data.specificbureaudirectors);
      });
    },
    SpecificbureauDirectorById(context, payload){
        axios.get('/specificbureaudirector/show/'+payload)
              .then((response)=>{
                  console.log(response.data);
                  context.commit('specificbureaudirector', response.data.specificbureaudirector);
              });
  }
}
const mutations = {
    specificbureaudirectors(state, data){
      return state.specificbureaudirectors = data;
    },
    specificbureaudirector(state, data){
      return state.specificbureaudirector = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};




