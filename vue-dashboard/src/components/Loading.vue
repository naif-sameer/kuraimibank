<template>
  <div class="w-full min-h-[85vh] rounded-lg grid place-content-center">
    <div class="loading-circle mx-auto relative w-16 h-16">
      <div v-for="i in 12" class="loading-child" :class="`loading-circle${i}`" />
    </div>
  </div>
</template>

<style>
.loading-circle .loading-child {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
}

.loading-circle .loading-child:before {
  @apply bg-purple-700;

  content: '';
  display: block;
  margin: 0 auto;
  width: 15%;
  height: 15%;
  border-radius: 100%;
  animation: loading-circleBounceDelay 1.2s infinite ease-in-out both;
}

.loading-circle .loading-circle2 {
  transform: rotate(30deg);
}

.loading-circle .loading-circle3 {
  transform: rotate(60deg);
}

.loading-circle .loading-circle4 {
  transform: rotate(90deg);
}

.loading-circle .loading-circle5 {
  transform: rotate(120deg);
}

.loading-circle .loading-circle6 {
  transform: rotate(150deg);
}

.loading-circle .loading-circle7 {
  transform: rotate(180deg);
}

.loading-circle .loading-circle8 {
  transform: rotate(210deg);
}

.loading-circle .loading-circle9 {
  transform: rotate(240deg);
}

.loading-circle .loading-circle10 {
  transform: rotate(270deg);
}

.loading-circle .loading-circle11 {
  transform: rotate(300deg);
}

.loading-circle .loading-circle12 {
  transform: rotate(330deg);
}

.loading-circle .loading-circle2:before {
  animation-delay: -1.1s;
}

.loading-circle .loading-circle3:before {
  animation-delay: -1s;
}
.loading-circle .loading-circle4:before {
  animation-delay: -0.9s;
}
.loading-circle .loading-circle5:before {
  animation-delay: -0.8s;
}
.loading-circle .loading-circle6:before {
  animation-delay: -0.7s;
}
.loading-circle .loading-circle7:before {
  animation-delay: -0.6s;
}
.loading-circle .loading-circle8:before {
  animation-delay: -0.5s;
}
.loading-circle .loading-circle9:before {
  animation-delay: -0.4s;
}
.loading-circle .loading-circle10:before {
  animation-delay: -0.3s;
}
.loading-circle .loading-circle11:before {
  animation-delay: -0.2s;
}
.loading-circle .loading-circle12:before {
  animation-delay: -0.1s;
}

@keyframes loading-circleBounceDelay {
  0%,
  80%,
  100% {
    transform: scale(0);
  }
  40% {
    transform: scale(1);
  }
}
</style>
