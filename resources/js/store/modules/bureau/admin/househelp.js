
//househelp module

const state = {
    househelps:[],
    househelp:[],
  };
const getters = {
    Househelps(state){
      return state.househelps;
    },
    Househelp(state){
      return state.househelp;
    }
  };
const actions = {
    househelps(context){//permission.index route laravel
      axios.get('/househelp/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('househelps', response.data.househelps);
      });
    },
    HousehelpById(context, payload){
        axios.get('/househelp/show/'+payload)
              .then((response)=>{
                  console.log(response.data);
                  context.commit('househelp', response.data.househelp);
              });
  }
}
const mutations = {
    househelps(state, data){
      return state.househelps = data;
    },
    househelp(state, data){
      return state.househelp = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};





