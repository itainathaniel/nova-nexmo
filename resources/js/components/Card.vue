<template>
    <loading-view :loading="loading">
        <card class="relative px-6 py-4 card-panel">
            <div class="flex mb-4">
                <h3 class="mr-3 text-base text-80 font-bold">Nexmo balance</h3>
            </div>
            <p :class="[balanceTextColor, 'flex', 'items-center', 'text-center', 'text-4xl', 'mb-4']">
                {{ balance }}
            </p>
            <div class="flex items-center">
                <p class="text-80" v-if="auto_reload">
                    AutoReload is <span class="text-green">enabled</span>
                </p>
                <p class="text-80" v-else>
                    AutoReload is <span class="text-orange">not enabled</span>
                </p>
            </div>
        </card>
    </loading-view>
</template>

<script>
export default {
    props: ['card'],

    data() {
        return {
            loading: true,
            balance: 0,
            auto_reload: false,
            decimals: this.card.decimals || 2
        }
    },

    mounted() {
        Nova.request().get('/nova-vendor/nova-nexmo/balance').then(response => {
            this.balance = this.roundBalance(response.data.balance)
            this.auto_reload = response.data.auto_reload
            this.loading = false
        })
        .catch(error => {
            this.$toasted.show(error.response.data.error, {type: 'error'})
        });
    },

    methods: {
        roundBalance(balance) {
            return Number(Math.round(`${balance}e${this.decimals}`)+`e-${this.decimals}`)
        }
    },

    computed: {
        balanceTextColor() {
            return this.balance > 10
                ? 'text-green'
                : this.balance > 5
                    ? 'text-yellow'
                    : 'text-red'
        }
    }
}
</script>

<style>
.text-red { color: #e3342f; }
.text-yellow { color: #ffed4a; }
.text-orange { color: #f6993f; }
.text-green { color: #38c172; }
</style>
