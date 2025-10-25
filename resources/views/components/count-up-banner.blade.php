<div
  class="bg-gray-800 text-white text-sm p-2 text-center"
  x-data="craftAttackTimer()"
  x-init="init()"
>
  <span x-text="timerText"></span>
</div>

<script>
  function craftAttackTimer() {
    return {
      startTime: new Date('2025-10-25T12:00:00+02:00').getTime(),
      timerText: '',

      init() {
        setInterval(() => {
          this.updateTimer();
        }, 1000);
      },

      updateTimer() {
        const now = new Date().getTime();
        const difference = now - this.startTime;

        if (difference < 0) {
          this.timerText = 'CraftAttack startet bald!';
          return;
        }

        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor(
          (difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60),
        );
        const minutes = Math.floor(
          (difference % (1000 * 60 * 60)) / (1000 * 60),
        );
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        this.timerText = `CraftAttack läuft seit: ${days}T ${hours}Std ${minutes}Min ${seconds}Sek`;
      },
    };
  }
</script>