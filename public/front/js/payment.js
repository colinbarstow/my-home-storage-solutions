const stripe = Stripe(stripeKey);
const elements = stripe.elements();
const cardElement = elements.create('card', {
    hidePostalCode: true
});

cardElement.mount('#card-element');


const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');

console.log('before click');

cardButton.addEventListener('click', async (e) => {
    document.getElementById('loader_lad').style.display = 'block';
    const { paymentMethod, error } = await stripe.createPaymentMethod(
        'card', cardElement, {
            billing_details: { name: cardHolderName.value }
        }
    );

    if (error) {
        console.log(error);
        document.getElementById('loader_lad').style.display = 'none';
    } else {
        window.livewire.emit('paymentMethodCreated', { paymentMethod: paymentMethod.id });
    }
});


