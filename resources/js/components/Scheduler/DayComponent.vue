<template>
    <div class="container-fluid mt-3">
        <scheduler-component id="dp" :config="initConfig" ref="scheduler"></scheduler-component>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                initConfig: {
                    crosshairType: "Disabled",
                    timeHeaders: [
                    {
                        "groupBy": "Day"
                    },
                    {
                        "groupBy": "Hour"
                    }
                    ],
                    scale: "Hour",
                    days: 1,
                    startDate: DayPilot.Date.today(),
                    businessBeginsHour: 0,
                    businessEndsHour: 24,
                    businessWeekends: true,
                    eventHeight: 50,
                    timeRangeSelectedHandling: "Enabled",
                    eventMoveHandling: "Update",
                        onEventMoved: function (args) {
                        this.message("S.O. moved: " + args.e.text());
                    },
                    eventResizeHandling: "Update",
                        onEventResized: function (args) {
                        this.message("S.O. resized: " + args.e.text());
                    },
                    eventDeleteHandling: "Update",
                        onEventDeleted: function (args) {
                        this.message("S.O. deleted: " + args.e.text());
                    },
                    eventClickHandling: "Select",
                        onEventEdited: function (args) {
                        this.message("S.O. selected: " + args.e.text());
                    },
                    eventHoverHandling: "Bubble",
                    rowMinHeight: 50,
                },
                loading: false,
            }
        },
        computed: {
            scheduler () {
                return this.$refs.scheduler.control;
            }
        },
        methods: { 
            loadEvents () {
                this.loading = true;
                axios
                .get('/api/tasks')
                .then(response => {
                    var data = response.data.data;
                    this.scheduler.update({events: data});
                })
                .catch(error => {
                    console.log(error)
                })
                .finally(() => this.loading = false)
            },
            loadResources () {
                this.loading = true;
                axios
                .get('/api/resources')
                .then(response => {
                    var data = response.data
                    this.scheduler.update({resources: data});
                })
                .catch(error => {
                    console.log(error)
                })
                .finally(() => this.loading = false)
            }
        },
        mounted () {
            this.loadResources();
            this.loadEvents();
        }
    }
</script>
