$(".dial").knob({
  min: 0,
  max: 100,
  thickness: 0.1
});
$(".knob").knob({
  draw: function() {
    if ("tron" == this.$.data("skin")) {
      this.cursorExt = 0.3;
      var t,
        i = this.arc(this.cv);
      return (
        (this.g.lineWidth = this.lineWidth),
        this.o.displayPrevious &&
          ((t = this.arc(this.v)),
          this.g.beginPath(),
          (this.g.strokeStyle = this.pColor),
          this.g.arc(
            this.xy,
            this.xy,
            this.radius - this.lineWidth,
            t.s,
            t.e,
            t.d
          ),
          this.g.stroke()),
        this.g.beginPath(),
        (this.g.strokeStyle = this.o.fgColor),
        this.g.arc(
          this.xy,
          this.xy,
          this.radius - this.lineWidth,
          i.s,
          i.e,
          i.d
        ),
        this.g.stroke(),
        (this.g.lineWidth = 2),
        this.g.beginPath(),
        (this.g.strokeStyle = this.o.fgColor),
        this.g.arc(
          this.xy,
          this.xy,
          this.radius - this.lineWidth + 1 + (2 * this.lineWidth) / 3,
          0,
          2 * Math.PI,
          !1
        ),
        this.g.stroke(),
        !1
      );
    }
  }
});
