
//permission

const state = {
    constituencies:[],
    countyconstituencies:[],
  },
  getters = {
    Constituencies(state){
      return state.constituencies;
    },
    CountyConstituencies(state){
      return state.countyconstituencies;
    }
  };
const actions = {
    constituencies(context){
        axios.get('/constituencies/get')
        .then((response)=>{
          context.commit('constituencies', response.data.constituencies);
        });
    },
    countyconstituencies(context, payload){
        axios.get('/constituency/get/list/'+payload)//constituencies by countyconstituencies id
        .then((response)=>{
            // console.log(response.data);
          context.commit('countyconstituencies', response.data.constituencies);
          console.log(response.data.constituencies);
        })
    }
  };
const mutations = {
    constituencies(state, data){
      return state.towns = data;
    },
    countyconstituencies(state, payload){
      return state.countyconstituencies = payload;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
}
