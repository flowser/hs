
//permission

const state = {
    specificbureau:[],
  },
  getters = {
    Specificbureau(state){
      return state.specificbureau;
    },
  }
const actions = {
    specificbureau(context){
        axios.get('/specificbureau/get')
        .then((response)=>{
        //   console.log(response.data.specificbureau);
          context.commit('specificbureau', response.data.specificbureau);
        })
    },
  }
const mutations = {
    specificbureau(state, data){
      return state.specificbureau = data;
    },
  }
export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
}


