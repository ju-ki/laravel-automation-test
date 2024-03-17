import axios from "axios";

export default {
    data() {
        return {
            buildingData: {
                id: "",
                building_name: "",
                floor: ""
            },
            errors: []
        };
    },
    template: `
    <div>
        <label for="id">物件コード</label>
        <input type="text" id="id" v-model="buildingData.id" readonly disabled>
        <label for="name">物件名</label>
        <input type="text" id="name" v-model="buildingData.building_name">
        <p v-for="error in errors['buildingData.building_name']" style="color:red;">{{error}}</p>
        <label for="floor">間取り</label>
        <select id="floor" v-model="buildingData.floor">
            <option value="">未選択</option>
            <option value="1">1DLK</option>
            <option value="2">2DLK</option>
        </select>
        <p v-for="error in errors['buildingData.floor']" style="color:red;">{{error}}</p>

        <button @click="send">登録</button>
    </div>`,
    mounted() {
        const url = new URLSearchParams(location.search);
        const param = url.get("id");

        if (param) {
            this.buildingData.id = param;
            this.getBuilding();
        }
    },
    methods: {
        async send() {
            if (confirm("登録しますか?")) {
                await axios.post('/api/postBuilding', {
                    "buildingData": this.buildingData
                }).then((response) => {
                    console.log(response);
                    this.buildingData = response.data;
                    history.replaceState("", "", `/building/detail?id=${this.buildingData.id}`);
                }).catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                    console.log(error);
                });
            }
        },
        async getBuilding() {
            await axios.get('/api/getBuilding', {
                params: {
                    id: this.buildingData.id
                }
            }).then((response) => {
                this.buildingData = response.data;
            }).catch((error) => {
                console.log(error);
            })
        }
    },
};
