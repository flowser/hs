
//permission

const state = {
    bureau:[],
    bureaus:[],
  },
  getters = {
    Bureau(state){
      return state.bureau;
    },
    Bureaus(state){
      return state.bureaus;
    }
  }
const actions = {
    bureau(context){
        axios.get('/bureau/get')
        .then((response)=>{
        //   console.log(response.data.bureau);
          context.commit('bureau', response.data.bureau);
        })
    },
    bureaus(context){
        axios.get('/bureaus/get/list')
        .then((response)=>{
          console.log(response.data);
          context.commit('bureaus', response.data.bureaus);
        })
    }
  }
const mutations = {
    bureau(state, data){
      return state.bureau = data;
    },
    bureaus(state, data){
      return state.bureaus = data;
    }
  }

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
}


