//Importing Line class from the vue-chartjs wrapper
import { Line } from 'vue-chartjs'
//Exporting this so it can be used in other components
export default {
    // extend: Line,
    extends: Line,
    data() {
        return {
            label: [],
            rows: []
        }
    },
    mounted() {
        this.getSchools(new Date().getFullYear())
        // axios.get('/schools_chart')
        //     .then((response) => {
        //         // console.log(response);
        //         this.label = response.data.data.lables
        //         this.rows = response.data.data.rows
        //         this.setGraph()
        //     })
        //     .catch((error) => {
        //         this.errors = error.response.data.errors
        //     })

    },
    methods: {
        getSchools(data) {
            console.log(data);

            var payload = {
                model: '/schools_chart',
                update: 'updateSchoolChartList',
                data: data,
            }

            this.$store.dispatch("filterItems", payload).then((res) => {
                this.setGraph()
            });
        },
        setGraph() {
            this.renderChart({
                labels: this.schools_chart.data.lables,
                // labels: this.label,
                datasets: [
                    {
                        label: 'Schools',
                        backgroundColor: '#1564c0',
                        data: this.schools_chart.data.rows
                        // data: this.rows
                    }
                ]
            }, { responsive: true, maintainAspectRatio: false })
        },
        ref(data) {
            axios.post('/getChartData', data)
                .then((response) => {
                    // console.log(response);
                    this.label = response.data.data.lables
                    this.rows = response.data.data.rows
                    this.setGraph()
                })
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        }
    },
    created() {
        eventBus.$on('chartEvent', data => {
            this.label = data.lables
            this.data = data.rows
        });
        eventBus.$on('DashchartEvent', data => {
            this.getSchools(data)
        });
    },
    computed: {
        schools_chart() {
            return this.$store.getters.schools_chart
        }
    },
}
