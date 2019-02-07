
//permission

const state = {
    towns:[],
    countytowns:[],
  },
  getters = {
    Towns(state){
      return state.towns;
    },
    CountyTowns(state){
      return state.countytowns;
    }
  };
const actions = {
    towns(context){
        axios.get('/towns/get')
        .then((response)=>{
          context.commit('towns', response.data.towns);
        });
    },
    countytowns(context, payload){
        axios.get('/town/get/list/'+payload)//towns by countytowns id
        .then((response)=>{
          context.commit('countytowns', response.data.towns);
          console.log(response.data.towns);
        })
    }
  };
const mutations = {
    towns(state, data){
      return state.towns = data;
    },
    countytowns(state, payload){
      return state.countytowns = payload;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
}
