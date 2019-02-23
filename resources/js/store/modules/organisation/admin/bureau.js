
//permission

const state = {
    bureaus:[],
    allbureaus:[],
    bureau:[],
  },
  getters = {
    Bureaus(state){
      return state.bureaus;
    },
    AllBureaus(state){
      return state.allbureaus;
    },
    Bureau(state){
      return state.bureau;
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
    },
    BureauById(context, payload){
        axios.get('/bureau/show/'+payload)
              .then((response)=>{
                  console.log(response.data);
                  context.commit('bureau', response.data.bureau);
              });
    },
  }
const mutations = {
    bureaus(state, data){
      return state.bureaus = data;
    },
    allbureaus(state, data){
      return state.allbureaus = data;
    },
    bureau(state, data){
      return state.bureau = data;
    },
  }

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
}


