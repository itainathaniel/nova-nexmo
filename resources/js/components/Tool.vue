<template>
    <div>
    	<heading class="mb-6">Send SMS</heading>

        <card class="mb-6 py-3 px-6">
			<div>
				<div class="flex border-b border-40">
					<div class="w-1/5 px-8 py-6">
						<label class="inline-block text-80 h-9 pt-2" for="send-sms-to">
							Phone Number
						</label>
						<p class="text-sm leading-normal text-80 italic"></p>
					</div>
					<div class="w-1/2 px-8 py-6">
						<input v-model="to" id="send-sms-to" type="text" class="w-full form-control form-input form-input-bordered">
					</div>
				</div>
			</div>
			<div>
				<div class="flex border-b border-40">
					<div class="w-1/5 px-8 py-6">
						<label class="inline-block text-80 h-9 pt-2" for="send-sms-from">
							From
						</label>
						<p class="text-sm leading-normal text-80 italic"></p>
					</div>
					<div class="w-1/2 px-8 py-6">
						<input v-model="from" id="send-sms-from" type="text" class="w-full form-control form-input form-input-bordered">
					</div>
				</div>
			</div>
			<div>
				<div class="flex border-b border-40">
					<div class="w-1/5 px-8 py-6">
						<label class="inline-block text-80 h-9 pt-2" for="send-sms-body">Text</label>
						<p class="text-sm leading-normal text-80 italic"></p>
					</div>
					<div class="w-1/2 px-8 py-6">
						<textarea v-model="body" id="send-sms-body" class="w-full form-control form-input form-input-bordered py-3 min-h-textarea"></textarea>
					</div>
				</div>
			</div>
			<div class="bg-30 flex px-8 py-4">
				<button class="ml-auto btn btn-default btn-primary mr-3" @click="sendSMS">Send SMS</button>
			</div>
        </card>
    </div>
</template>

<script>
    export default {
        props: ['resourceName', 'resourceId', 'field'],

        data() {
        	return {
        		to: '',
        		from: '',
        		body: ''
        	}
        },

        methods: {
        	sendSMS() {
        		if (!this.body.length || !this.from.length || !this.to.length) {
        			this.$toasted.show('Please fill all the field', {type: 'error'})
        			return false
        		}

	            Nova.request()
	                .post('/nova-vendor/nova-nexmo/send-sms', {
	                    to: this.to,
	                    text: this.body,
	                })
	                .then(response => {
	                    this.$toasted.show('SMS sent successfully!', { type: 'success' })
	                })
	                .catch(response => {
	                    this.$toasted.show('SMS failed to sent :(', {type: 'error'})
	                });
        	}
        }
    }
</script>
