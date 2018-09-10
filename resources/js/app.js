Nova.booting((Vue, router) => {
    Vue.component('nova-nexmo', require('./components/Card'))
    router.addRoutes([{
        name: 'NovaNexmoSendSMS',
        path: '/nexmo-send-sms',
        component: require('./components/Tool'),
    }, ])
})
