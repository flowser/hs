
//permission

const state = {
    counties:[],//general counties
    countrycounties:[],//counties per coutrt id and general counies without link with countyid
  },
  getters = {
    Counties(state){
      return state.counties;
    },
    CountryCounties(state){
      return state.countrycounties;
    }
  };
const actions = {
    counties(context){
        axios.get('/county/get')
        .then((response)=>{
          console.log(response.data.counties);
          context.commit('counties', response.data.counties);
        });
    },
    countrycounties(context, payload){
        axios.get('/county/get/list/'+payload)//counties by country id
        .then((response)=>{

          context.commit('countrycounties', response.data.counties);
          console.log(response.data.counties);
        })
    }
  };
const mutations = {
    counties(state, data){
      return state.counties = data;
    },
    countrycounties(state, payload){
      return state.countrycounties = payload;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
}
