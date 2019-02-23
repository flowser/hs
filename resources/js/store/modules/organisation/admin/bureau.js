
//permission

const state = {
    bureaus:[],
    allbureaus:[],
  },
  getters = {
    Bureaus(state){
      return state.bureaus;
    },
    AllBureaus(state){
      return state.allbureaus;
    }
  }
const actions = {
    bureaus(context){
        axios.get('/bureau/get')
        .then((response)=>{
        //   console.log(response.data.bureau);
          context.commit('bureaus', response.data.bureaus);
        })
    },
    allbureaus(context){
        axios.get('/bureaus/get/list')
        .then((response)=>{
          console.log(response.data);
          context.commit('allbureaus', response.data.allbureaus);
        })
    }
  }
const mutations = {
    bureaus(state, data){
      return state.bureaus = data;
    },
    allbureaus(state, data){
      return state.allbureaus = data;
    }
  }

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
}


