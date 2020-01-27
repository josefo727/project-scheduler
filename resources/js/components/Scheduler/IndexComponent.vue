<template>
    <b-container>
        <div class="row justify-content-between">
            <div class="mt-3">
                <b-button-group>
                    <b-button>Today</b-button>
                </b-button-group>
            </div>
            <div class="mt-3">
                <b-button-group>
                    <b-button variant="info" @click="type = 'day'">Day</b-button>
                    <b-button variant="info" @click="type = 'week'">Week</b-button>
                    <b-button variant="info" @click="type = 'month'">Month</b-button>
                </b-button-group>
            </div>
        </div>
        <day-component v-if="type == 'day'"/>
        <week-component v-if="type == 'week'"/>
        <month-component v-if="type == 'month'"/>

    </b-container>
</template>

<script>
    export default {
        data () {
            return {
                type: 'day',
            }
        },
    }
</script>

<style lang="css">
.scheduler_default_corner div:nth-of-type(4) {
    display: none !important;
}
.scheduler_default_corner div:nth-of-type(2) {
    display: none !important;
}
</style>