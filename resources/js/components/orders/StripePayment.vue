<template>
    <div>
        <hr />
        <h3>Pay Invoice here</h3>
        <label>Card</label>
        <div id="card-element">

        </div>
        <button id="card-button" @click="test">
            Process Payment
        </button>
    </div>
</template>

<script>
    export default {
        name: "StripePayment",
        mounted(){
            this.includeStripe('js.stripe.com/v3/', function(){
                this.configureStripe();
            }.bind(this) );
        },
        props: ['order_id', 'user_id', 'callback'],
        data(){
            return {
                stripeAPIToken: 'pk_test_51HYtK4IkgVE5fsdbw5t4QKt9H1ZwBNYLT3AwJ3ph2sRflM1hp9n1KQ3KwKiuOCw3bOsxGzLx3ZipFNplaqpTqsZC00OXytB36F',
                stripe: '',
                elements: '',
                card: '',
                paymentMethodId: ''
            }
        },
        methods: {
            test() {
                this.stripe.createPaymentMethod(
                    'card', this.card, {
                        billing_details: { name: 'test' }
                    }
                ).then((result) => {
                   this.paymentMethodId = result.paymentMethod.id;
                    axios.get(`/payment/${this.user_id}/${this.order_id}/${this.paymentMethodId}`)
                        .then(res => {
                            alert('Invoice paid successfully');
                            this.callback();
                        }).catch(err => {
                        alert('Error Occured');
                    })
                });
            },
            includeStripe( URL, callback ){
                let documentTag = document, tag = 'script',
                    object = documentTag.createElement(tag),
                    scriptTag = documentTag.getElementsByTagName(tag)[0];
                object.src = '//' + URL;
                if (callback) { object.addEventListener('load', function (e) { callback(null, e); }, false); }
                scriptTag.parentNode.insertBefore(object, scriptTag);
            },
            configureStripe(){
                this.stripe = Stripe( this.stripeAPIToken );

                this.elements = this.stripe.elements();
                this.card = this.elements.create('card');

                this.card.mount('#card-element');
            }
        },

    }
</script>

<style scoped>

</style>
