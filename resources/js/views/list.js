import axios from "axios";

export default {
    data() {
        return {
            buildingData: [],
            floorData: {
                "1": "1LDK",
                "2": "2LDK"
            }
        };
    },
    template: `
    <div>
        物件一覧
        <template v-for="building in buildingData" v-if="buildingData.length">
            <a :href="'/building/detail?id=' + building.id">{{building.id}}</a>
            <div>{{building.building_name}}</div>
            <div>{{floorData[building.floor]}}</div>
        </template>
    </div>`,
    mounted() {
        console.log('Component mounted.');
        this.getBuildingList();
    },
    methods: {
        async getBuildingList() {
            await axios.get('/api/getBuildingList').then((response) => {
                this.buildingData = response.data;
                console.log(response);
            }).catch((error) => {
                console.log(error);
            });
        }
    },
};
