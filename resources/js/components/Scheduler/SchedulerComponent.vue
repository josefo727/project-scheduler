<template>
    <div :id="id"></div>
</template>

<script>
    export default {
        props: ['id', 'config'],
        mounted() {
            this.control = new DayPilot.Scheduler(this.id, this.config).init();
        }
    }
</script>
