<template>
<div class="bloc-modale" v-if="revele">
    <div class="overlay" v-on:click="toggleModale"></div>
        <div class="modale card">
            <div v-on:click="toggleModale" class="btn-modale btn btn-danger">X</div>
            <h2>{{product.name}}</h2>
            <div>{{product.description}}</div>
        </div>
</div>
</template>

<script>
export default {
    name:'ProductModale',
    props: ['revele', 'toggleModale', 'product'],
}
</script>

<style scoped>
.bloc-modale {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.overlay {
    background: rgba(0, 0, 0, 0.5);
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}

.modale {
    background: #f1f1f1;
    color: #333;
    padding: 50px;
    position: fixed;
    top: 30%;
}

.btn-modale {
    position: absolute;
    top: 10px;
    right: 10px;
}

</style>