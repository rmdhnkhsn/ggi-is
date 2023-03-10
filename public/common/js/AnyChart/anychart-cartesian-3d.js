/**
 * AnyChart is lightweight robust charting library with great API and Docs, that works with your stack and has tons of chart types and features.
 *
 * Modules: cartesian-3d, theme-cartesian-3d
 * Version: 8.11.0.1934 (2021-12-01)
 * License: https://www.anychart.com/buy/
 * Contact: sales@anychart.com
 * Copyright: AnyChart.com 2021. All rights reserved.
 */
(function (global, factory) {
    if (typeof module === 'object' && typeof module.exports === 'object') {
        var wrapper = function (w) {
            if (!w.document) {
                throw Error('AnyChart requires a window with a document');
            }
            factory.call(w, w, w.document);
            try {
                w.acgraph.isNodeJS = Object.prototype.toString.call(global.process) == "[object process]";
            } catch (e) { };
            return w.anychart;
        };
        module.exports = global.document ? wrapper(global) : wrapper;
    } else {
        factory.call(global, window, document)
    }
})(typeof window !== 'undefined' ? window : this, function (window, document, opt_noGlobal) {
    var $, _, $_ = this.anychart;
    if ($_ && (_ = $_._)) {
        $ = $_.$
    } else {
        throw Error('anychart-base.min.js module should be included first. See modules explanation at https://docs.anychart.com/Quick_Start/Modules for details');
        $ = {};
        _ = {}
    }
    if (!_.cartesian_3d) {
        _.cartesian_3d = 1;
        (function ($) {
            var O9 = function (a, b, c) {
                if (a = a.f[b]) a.zIndex = c
            },
                Dta = function (a) {
                    return $.oa(a.sl()) + "_" + $.oa(a.ab())
                },
                Eta = function (a, b) {
                    var c = 0;
                    (0, $.Re)(a, function (a, e, f) {
                        b.call(void 0, a, e, f) && ++c
                    }, void 0);
                    return c
                },
                P9 = function () {
                    $.mz.call(this)
                },
                Q9 = function () {
                    $.mz.call(this)
                },
                R9 = function () {
                    $.eA.call(this)
                },
                S9 = function () {
                    $.hA.call(this)
                },
                T9 = function () {
                    $.kA.call(this)
                },
                U9 = function (a) {
                    $.OA.call(this, a)
                },
                V9 = function (a) {
                    $.OA.call(this, a)
                },
                Fta = function (a, b, c) {
                    if (!b.o("skipDrawing")) {
                        var d = b.o("x"),
                            e = b.o("zero"),
                            f = b.o("value");
                        a.wa || (d += a.f, e -= a.b, f -= a.b);
                        b = c.bottom;
                        var h = c.back,
                            k = c.left,
                            l = c.right,
                            m = c.front,
                            p = c.top,
                            q = c.rightHatch,
                            r = c.frontHatch;
                        c = c.topHatch;
                        var t = a.i,
                            u = a.D,
                            v = m.stroke().thickness % 2 / 2 || 0;
                        if (a.wa) {
                            var w = a.j;
                            var x = Math.min(e, f) + a.f;
                            d = d - w / 2 - a.b;
                            a = Math.abs(e - f);
                            e = v;
                            f = 0
                        } else a = a.j, x = d - a / 2, d = Math.min(e, f), w = Math.abs(e - f), f = e = -v;
                        b.moveTo(x + v, d + w).lineTo(x + a, d + w).lineTo(x + a + t - v, d + w - u + v).lineTo(x + t, d + w - u).close();
                        h.moveTo(x + t, d - u).lineTo(x + t + a, d - u).lineTo(x + t + a, d - u + w).lineTo(x + t, d - u + w).close();
                        k.moveTo(x, d).lineTo(x +
                            t + e, d - u + v).lineTo(x + t, d + w - u).lineTo(x, d + w - v).close();
                        l.moveTo(x + a, d).lineTo(x + a + t + f, d - u + v).lineTo(x + a + t, d + w - u).lineTo(x + a, d + w - v).close();
                        q.moveTo(x + a, d).lineTo(x + a + t + f, d - u + v).lineTo(x + a + t, d + w - u).lineTo(x + a, d + w - v).close();
                        m.moveTo(x, d).lineTo(x + a, d).lineTo(x + a, d + w).lineTo(x, d + w).close();
                        r.moveTo(x, d).lineTo(x + a, d).lineTo(x + a, d + w).lineTo(x, d + w).close();
                        p.moveTo(x + v, d).lineTo(x + a, d).lineTo(x + a + t - v, d - u + v).lineTo(x + t, d - u).close();
                        c.moveTo(x + v, d).lineTo(x + a, d).lineTo(x + a + t - v, d - u + v).lineTo(x + t, d - u).close()
                    }
                },
                W9 = function (a) {
                    $.OA.call(this, a)
                },
                X9 = function () {
                    $.VB.call(this);
                    this.Fa("cartesian", "cartesian3dBase", "cartesian3d");
                    this.K = 0;
                    this.qe = "cartesian-3d"
                },
                Y9 = function (a) {
                    var b = $.xo(a.domTarget);
                    if (b && b.X && b.X.check(4)) {
                        var c = $.xo(a.relatedDomTarget);
                        c && c.X && c.X == b.X && c.index == b.index || (b = b.X) && !b.ld && b.enabled() && (c = b.Yi(), b.jb(null), b.nh(a.ZD), b.jb(c))
                    }
                },
                Gta = function (a, b, c) {
                    var d, e, f;
                    var h = $.dm("fill", 1, !0)(a, c);
                    c = $.C(h) ? h.opacity : 1;
                    var k = $.C(h) ? h.color : h;
                    h = $.Ml(k);
                    if (null === h) a = k = d = e = f = h = "none";
                    else {
                        k =
                            h.tk;
                        var l = $.Cl(k);
                        e = $.Jl(l, .2);
                        h = $.Jl(l, .25);
                        f = $.Il([255, 255, 255], l, .1);
                        d = $.Wb($.Il(l, e, .7));
                        f = $.Wb($.Il(e, f, .1));
                        l = $.Wb($.Il(l, e, .1));
                        a = {
                            angle: a.g("isVertical") ? 0 : 90,
                            opacity: c,
                            keys: [$.Ql(d, .2), $.Ql(k, .3)]
                        };
                        k = $.Ql(l, .2);
                        d = $.Ql(d, .2);
                        e = $.Wb(e);
                        h = $.Wb(h)
                    }
                    b.bottom.fill({
                        color: e,
                        opacity: c
                    });
                    b.back.fill({
                        color: f,
                        opacity: c
                    });
                    b.left.fill({
                        color: h,
                        opacity: c
                    });
                    b.right.fill({
                        color: k,
                        opacity: c
                    });
                    b.top.fill({
                        color: d,
                        opacity: c
                    });
                    b.front.fill(a)
                },
                Hta = function () {
                    var a = new X9;
                    a.sa("defaultSeriesType", "column");
                    a.$c();
                    $.GA(a);
                    a.Wg();
                    return a
                },
                $9 = function (a, b) {
                    var c = Z9(a),
                        d = a.i,
                        e = a.li;
                    !b && a.g("zDistribution") && (e = (e - d * (c - 1)) / c);
                    return e
                },
                a$ = function (a, b) {
                    var c = Z9(a),
                        d = a.j,
                        e = a.Jh;
                    !b && a.g("zDistribution") && (e = (e - d * (c - 1)) / c);
                    return e
                },
                Z9 = function (a) {
                    return Eta(a.gb, function (a) {
                        return !!(a && a.enabled() && a.check($.sB))
                    })
                },
                Ita = function (a, b) {
                    for (var c = 0, d = 0, e = Math.min(a.gb.length - 1, b); d <= e; d++) {
                        var f = a.gb[d];
                        f && f.enabled() && f.check($.sB) && c++
                    }
                    return c - 1
                },
                Jta = function (a) {
                    var b = new X9;
                    b.Fa("area3d");
                    b.qe = "area-3d";
                    b.sa("defaultSeriesType", "area");
                    b.$c();
                    b.Wg();
                    $.GA(b);
                    arguments.length && b.jl.apply(b, arguments);
                    return b
                },
                Kta = function (a) {
                    var b = new X9;
                    b.Fa("bar", "bar3d");
                    b.qe = "bar-3d";
                    b.sa("defaultSeriesType", "bar");
                    b.$c();
                    b.Wg();
                    $.GA(b);
                    arguments.length && b.jl.apply(b, arguments);
                    return b
                },
                Lta = function (a) {
                    var b = new X9;
                    b.Fa("column", "column3d");
                    b.qe = "column-3d";
                    b.sa("defaultSeriesType", "column");
                    b.$c();
                    b.Wg();
                    $.GA(b);
                    arguments.length && b.jl.apply(b, arguments);
                    return b
                },
                Mta = function (a) {
                    var b = new X9;
                    b.Fa("line3d");
                    b.qe = "line-3d";
                    b.sa("defaultSeriesType", "line");
                    b.$c();
                    b.Wg();
                    $.GA(b);
                    arguments.length && b.jl.apply(b, arguments);
                    return b
                },
                Nta = {
                    SB: "area",
                    bF: "bar",
                    cF: "column",
                    qt: "line",
                    Voa: "line-2d"
                },
                Ota = {
                    name: "top",
                    Pb: "path",
                    Wb: null,
                    Xb: "stroke",
                    Zb: !0,
                    Gb: !1,
                    zIndex: 3E-6
                },
                b$ = {
                    name: "bottom",
                    Pb: "path",
                    Wb: null,
                    Xb: "stroke",
                    Zb: !0,
                    Gb: !1,
                    zIndex: 2E-6
                },
                c$ = {
                    name: "left",
                    Pb: "path",
                    Wb: null,
                    Xb: "stroke",
                    Zb: !0,
                    Gb: !1,
                    zIndex: 1E-6
                },
                d$ = {
                    name: "right",
                    Pb: "path",
                    Wb: null,
                    Xb: "stroke",
                    Zb: !0,
                    Gb: !1,
                    zIndex: 4E-6
                },
                e$ = {
                    name: "back",
                    Pb: "path",
                    Wb: null,
                    Xb: "stroke",
                    Zb: !0,
                    Gb: !1,
                    zIndex: 0
                },
                f$ = {
                    name: "frontHatch",
                    Pb: "path",
                    Wb: "hatchFill",
                    Xb: null,
                    Zb: !0,
                    Gb: !0,
                    zIndex: 8E-6
                },
                Pta = {
                    name: "rightHatch",
                    Pb: "path",
                    Wb: "hatchFill",
                    Xb: null,
                    Zb: !0,
                    Gb: !0,
                    zIndex: 7E-6
                },
                Qta = {
                    name: "topHatch",
                    Pb: "path",
                    Wb: "hatchFill",
                    Xb: null,
                    Zb: !0,
                    Gb: !0,
                    zIndex: 6E-6
                };
            $.H(P9, $.mz);
            $.g = P9.prototype;
            $.g.xg = function (a) {
                var b = 0;
                $.X(a, 4) && (b |= 4);
                $.X(a, 2) && (b |= 1);
                this.B(20, b | 8)
            };
            $.g.yG = function (a) {
                var b = this.ja() || $.nn(0, 0, 0, 0);
                a = Math.round(b.Ta() - a * b.height);
                var c = this.Rh().stroke();
                c = $.jp(c);
                a = $.O(a, c);
                c = b.sb() + this.li;
                var d = a - this.Jh;
                this.j.moveTo(b.sb(), a).lineTo(c, d).lineTo(b.bb() + this.li, d)
            };
            $.g.zG = function (a) {
                var b = this.ja() || $.nn(0, 0, 0, 0);
                a = Math.round(b.sb() + a * b.width);
                var c = this.Rh().stroke();
                c = $.jp(c);
                a = $.O(a, c);
                c = a + this.li;
                var d = Math.ceil($.O(b.Ta() - this.Jh, 1));
                this.j.moveTo(a, Math.ceil($.O(b.Ta(), 1))).lineTo(c, d).lineTo(c, b.Ub() - this.Jh)
            };
            $.g.vG = function (a, b, c, d) {
                if (!(0, window.isNaN)(b)) {
                    var e = this.ja() || $.nn(0, 0, 0, 0);
                    var f = Math.round(e.Ta() - b * e.height);
                    var h = Math.round(e.Ta() - a * e.height);
                    1 == a ? h -= d : h += d;
                    1 == b ? f -= d : f += d;
                    c.moveTo(e.sb(), f).lineTo(e.sb() + this.li, f - this.Jh).lineTo(e.bb() + this.li, f - this.Jh).lineTo(e.bb() + this.li, h - this.Jh).lineTo(e.sb() + this.li, h - this.Jh).lineTo(e.sb(), h).close()
                }
            };
            $.g.wG = function (a, b, c, d) {
                if (!(0, window.isNaN)(b)) {
                    var e = this.ja() || $.nn(0, 0, 0, 0);
                    var f = Math.round(e.sb() + b * e.width);
                    var h = Math.round(e.sb() + a * e.width);
                    1 == a ? h += d : h -= d;
                    1 == b ? f += d : f -= d;
                    c.moveTo(f + this.li, e.Ub() - this.Jh).lineTo(h + this.li, e.Ub() - this.Jh).lineTo(h + this.li, e.Ta() - this.Jh).lineTo(h, e.Ta()).lineTo(f, e.Ta()).lineTo(f + this.li, e.Ta() - this.Jh).close()
                }
            };
            $.H(Q9, P9);
            $.zu(Q9, P9);
            var g$ = P9.prototype;
            g$.isHorizontal = g$.Mb;
            g$.scale = g$.scale;
            g$.axis = g$.axis;
            g$ = Q9.prototype;
            $.F("anychart.standalones.grids.linear3d", function () {
                var a = new Q9;
                a.N($.om("standalones.linearGrid"));
                return a
            });
            g$.layout = g$.ve;
            g$.draw = g$.W;
            g$.parentBounds = g$.ja;
            g$.container = g$.O;
            $.H(R9, $.eA);
            R9.prototype.bs = function () {
                var a = $.Za(this.scale().transform(this.value(), .5), 0, 1);
                if (!(0, window.isNaN)(a)) {
                    var b = 0 == $.Qy(this).fl() % 2 ? 0 : -.5,
                        c = this.ja(),
                        d = this.Op();
                    $.Qy(this).clear();
                    var e = this.wc().li,
                        f = this.wc().Jh;
                    if ("horizontal" == this.ve()) {
                        var h = Math.round(c.Ub() + c.height - a * c.height);
                        1 == a ? h -= b : h += b;
                        $.Qy(this).moveTo(c.sb(), h).lineTo(c.sb() + e, h - f).lineTo(c.bb() + e, h - f)
                    } else "vertical" == this.ve() && (h = Math.round(c.sb() + a * c.width), 1 == a ? h += b : h -= b, $.Qy(this).moveTo(h + e, c.Ub() - f).lineTo(h + e, c.Ta() - f).lineTo(h,
                        c.Ta()));
                    c.top -= f;
                    c.height += f;
                    c.width += e;
                    $.Qy(this).clip(d.Ej(c))
                }
            };
            $.H(S9, $.hA);
            S9.prototype.bs = function () {
                var a = this.ve(),
                    b = this.g("from"),
                    c = this.g("to");
                this.g("from") > this.g("to") && (b = this.g("to"), c = this.g("from"));
                var d = $.Za(this.scale().transform(b, 0), 0, 1),
                    e = $.Za(this.scale().transform(c, 1), 0, 1);
                if (!(0, window.isNaN)(d) && !(0, window.isNaN)(e)) {
                    c = this.ja();
                    b = this.Op();
                    $.Qy(this).clear();
                    var f = this.wc().li,
                        h = this.wc().Jh;
                    if ("horizontal" == a) {
                        e = Math.floor(c.Ta() - c.height * e);
                        d = Math.ceil(c.Ta() - c.height * d);
                        a = c.sb();
                        var k = c.bb();
                        $.Qy(this).moveTo(a, e).lineTo(a + f, e - h).lineTo(k + f,
                            e - h).lineTo(k + f, d - h).lineTo(a + f, d - h).lineTo(a, d).close()
                    } else "vertical" == a && (a = c.Ta(), k = c.Ub(), d = Math.floor(c.sb() + c.width * d), e = Math.ceil(c.sb() + c.width * e), $.Qy(this).moveTo(d, a).lineTo(d + f, a - h).lineTo(d + f, k - h).lineTo(e + f, k - h).lineTo(e + f, a - h).lineTo(e, a).close());
                    c.top -= h;
                    c.height += h;
                    c.width += f;
                    $.Qy(this).clip(b.Ej(c))
                }
            };
            $.H(T9, $.kA);
            T9.prototype.ja = function (a, b, c, d) {
                b = T9.u.ja.call(this, a, b, c, d);
                $.n(a) || (a = this.wc().li, c = this.wc().Jh, b.top -= c, b.height += c, b.width += a);
                return b
            };
            $.H(U9, $.OA);
            $.WG[2] = U9;
            $.g = U9.prototype;
            $.g.type = 2;
            $.g.flags = $.sB | 49;
            $.g.Fh = {
                top: "path",
                bottom: "path",
                left: "path",
                right: "path",
                back: "path",
                front: "path",
                cap: "path",
                frontHatch: "path"
            };
            $.g.lK = function () {
                for (var a = this.X.Xf(); a.advance();) {
                    var b = a.o("shapes");
                    if (b) {
                        var c = a.o("zIndex");
                        this.bd.wt(c + 1E-8 * a.la(), b)
                    }
                }
            };
            $.g.Dd = function (a) {
                U9.u.Dd.call(this, a);
                this.ea = !0;
                a = this.X.xa;
                var b = this.X.la(),
                    c = this.X.gh(),
                    d = Dta(this.X);
                this.Ya = !c || b == a.p3[d];
                this.Ja = a.KM(b, c);
                this.P = a.LM(b, c);
                this.b = $9(a, c);
                this.i = a$(a, c);
                a.Qa().Ne() ? (O9(this.bd, "left", 4E-6), O9(this.bd, "right", 1E-6)) : (O9(this.bd, "left", 1E-6), O9(this.bd, "right", 4E-6));
                a.ab().Ne() ? (O9(this.bd, "top", 2E-6), O9(this.bd, "bottom", 3E-6)) : (O9(this.bd, "top", 3E-6), O9(this.bd, "bottom", 2E-6))
            };
            $.g.Mo = function (a) {
                var b = this.bd.dd(this.Dc, null, this.X.zIndex()),
                    c = a.o("x") + this.Ja,
                    d = a.o("zero") - this.P,
                    e = a.o("zeroMissing");
                a = a.o("value") - this.P;
                b.front.moveTo(c, d).lineTo(c, a);
                b.frontHatch.moveTo(c, d).lineTo(c, a);
                this.X.gh() ? this.f = [c, d, e] : (b.back.moveTo(c + this.b, d - this.i).lineTo(c + this.b, a - this.i), b.bottom.moveTo(c, d).lineTo(c + this.b, d - this.i), "none" == this.X.ab().gn() && a >= d && b.cap.moveTo(c, d).lineTo(c + this.b, d - this.i), b.left.moveTo(c, d).lineTo(c, a).lineTo(c + this.b, a - this.i).lineTo(c + this.b,
                    d - this.i).close());
                this.D = c;
                this.K = a;
                this.Ki = this.ma = d
            };
            $.g.tg = function (a) {
                var b = this.bd.dd(this.Dc),
                    c = a.o("x") + this.Ja,
                    d = a.o("zero") - this.P,
                    e = a.o("zeroMissing");
                a = a.o("value") - this.P;
                this.X.gh() ? this.f.push(c, d, e) : (b.bottom.lineTo(c + this.b, d - this.i), b.back.lineTo(c + this.b, a - this.i));
                e = b.front.BZ();
                this.Ya && (this.ea ? b.top.moveTo(e.x, e.y).lineTo(e.x + this.b, e.y - this.i).lineTo(c + this.b, a - this.i).lineTo(c, a).close() : b.top.moveTo(e.x, e.y).lineTo(c, a).lineTo(c + this.b, a - this.i).lineTo(e.x + this.b, e.y - this.i).close(), this.ea = !this.ea);
                if ("none" == this.X.ab().gn()) {
                    var f =
                        (d - e.y) * (c - e.x) / (a - e.y) + e.x;
                    0 < a - e.y && e.y <= d && a > d ? b.cap.moveTo(f, d).lineTo(f + this.b, d - this.i) : 0 > a - e.y && e.y > d && a <= d && b.cap.lineTo(f + this.b, d - this.i).lineTo(f, d).close()
                }
                b.front.lineTo(c, a);
                b.frontHatch.lineTo(c, a);
                this.D = c;
                this.K = a;
                this.ma = d
            };
            $.g.Hm = function () {
                if (this.G) {
                    var a = this.bd.dd(this.Dc),
                        b = a.front,
                        c = a.frontHatch;
                    if (this.f) {
                        for (var d = window.NaN, e = window.NaN, f = !1, h = this.f.length - 1; 0 <= h; h -= 3) {
                            var k = this.f[h - 2],
                                l = this.f[h - 1],
                                m = this.f[h];
                            m && !(0, window.isNaN)(d) ? (b.lineTo(d, l), c.lineTo(d, l)) : f && !(0, window.isNaN)(e) && (b.lineTo(k, e), c.lineTo(k, e));
                            b.lineTo(k, l);
                            c.lineTo(k, l);
                            d = k;
                            e = l;
                            f = m
                        }
                        b.close();
                        c.close();
                        this.f = null
                    } else (0, window.isNaN)(this.D) || (b.lineTo(this.D, this.Ki).close(), c.lineTo(this.D, this.Ki).close(), a.back.lineTo(this.D +
                        this.b, this.Ki - this.i).close(), a.bottom.lineTo(this.D, this.Ki).close(), "none" == this.X.ab().gn() && this.K >= this.X.Ki && a.cap.lineTo(this.D + this.b, this.Ki - this.i).lineTo(this.D, this.Ki).close());
                    (0, window.isNaN)(this.D) || a.right.moveTo(this.D, this.ma).lineTo(this.D, this.K).lineTo(this.D + this.b, this.K - this.i).lineTo(this.D + this.b, this.ma - this.i).close()
                }
            };
            $.H(V9, $.OA);
            $.WG[7] = V9;
            $.g = V9.prototype;
            $.g.type = 7;
            $.g.flags = $.sB | 263717;
            $.g.Fh = {
                top: "path",
                bottom: "path",
                left: "path",
                right: "path",
                back: "path",
                front: "path",
                frontHatch: "path",
                rightHatch: "path",
                topHatch: "path"
            };
            $.g.Dd = function (a) {
                V9.u.Dd.call(this, a);
                a = this.X.xa;
                var b = this.X.la(),
                    c = this.X.gh();
                this.f = a.KM(b, c);
                this.b = a.LM(b, c);
                this.i = $9(a, c);
                this.D = a$(a, c)
            };
            $.g.lK = function (a) {
                for (var b = this.X.Xf(); b.advance();) {
                    var c = b.o("shapes");
                    c && (a = b.o("zIndex"), this.bd.wt(a + 1E-8 * b.la(), c))
                }
            };
            $.g.tg = function (a, b) {
                var c = a.o("zIndex") + 1E-8 * (a.o("directIndex") + a.la());
                c = this.bd.dd(b, null, c);
                Fta(this, a, c)
            };
            $.g.vt = function (a) {
                var b = a.o("shapes"),
                    c;
                for (c in b) b[c].clear();
                Fta(this, a, b)
            };
            $.H(W9, $.OA);
            $.WG[33] = W9;
            $.g = W9.prototype;
            $.g.type = 33;
            $.g.flags = $.sB | 32848;
            $.g.Fh = {
                path: "path"
            };
            $.g.lK = function () {
                for (var a = this.X.Xf(); a.advance();) {
                    var b = a.o("shapes");
                    if (b) {
                        var c = a.o("zIndex");
                        this.bd.wt(c + 1E-8 * a.la(), b)
                    }
                }
            };
            $.g.Dd = function (a) {
                W9.u.Dd.call(this, a);
                this.K = !0;
                a = this.X.xa;
                var b = this.X.la();
                this.P = a.KM(b, !1);
                this.ea = a.LM(b, !1);
                this.i = $9(a, !1);
                this.D = a$(a, !1)
            };
            $.g.Mo = function (a) {
                this.b = a.o("x") + this.P;
                this.f = a.o("value") - this.ea
            };
            $.g.tg = function (a) {
                var b = this.bd.dd(this.Dc),
                    c = a.o("x") + this.P;
                a = a.o("value") - this.ea;
                this.K ? b.path.moveTo(this.b, this.f).lineTo(this.b + this.i, this.f - this.D).lineTo(c + this.i, a - this.D).lineTo(c, a).close() : b.path.moveTo(this.b, this.f).lineTo(c, a).lineTo(c + this.i, a - this.D).lineTo(this.b + this.i, this.f - this.D).close();
                this.K = !this.K;
                this.b = c;
                this.f = a
            };
            $.H(X9, $.VB);
            X9.prototype.Cf = function (a) {
                Y9(a);
                X9.u.Cf.call(this, a)
            };
            X9.prototype.gg = function (a) {
                Y9(a);
                X9.u.gg.call(this, a)
            };
            X9.prototype.Tj = function (a) {
                Y9(a);
                X9.u.Tj.call(this, a)
            };
            X9.prototype.Eh = function (a) {
                Y9(a);
                X9.u.Eh.call(this, a)
            };
            var h$ = {},
                i$ = $.XG | 5767168;
            h$.area = {
                Db: 2,
                Ib: 1,
                Kb: [{
                    name: "top",
                    Pb: "path",
                    Wb: null,
                    Xb: null,
                    Zb: !1,
                    Gb: !1,
                    zIndex: 3E-6
                }, b$, c$, d$, e$, $.YH, {
                    name: "cap",
                    Pb: "path",
                    Wb: null,
                    Xb: null,
                    Zb: !1,
                    Gb: !1,
                    zIndex: 3.5E-6
                }, f$],
                Nb: null,
                Hb: function (a, b, c) {
                    var d, e, f, h;
                    c = $.dm("fill", 1, !0)(a, c);
                    a = $.C(c) ? c.opacity : 1;
                    var k = $.C(c) ? c.color : c;
                    c = $.Ml(k);
                    if (null === c) k = d = e = f = h = c = "none";
                    else {
                        k = c.tk;
                        f = $.Cl(k);
                        var l = $.Jl(f, .2);
                        e = $.Jl(f, .3);
                        c = $.Jl(f, .25);
                        h = $.Il([255, 255, 255], f, .1);
                        d = $.Wb($.Il(f, l, .7));
                        e = $.Wb($.Il(f, e, .7));
                        h = $.Wb($.Il(l, h, .1));
                        f = $.Wb($.Il(f, l, .1));
                        k = {
                            angle: 90,
                            opacity: a,
                            keys: [$.Ql(d, .2), $.Ql(k, .3)]
                        };
                        d = $.Ql(e, .2);
                        e = f = $.Ql(f, .2);
                        c = $.Wb(c)
                    }
                    b.bottom.fill({
                        color: f,
                        opacity: a
                    });
                    b.back.fill({
                        color: h,
                        opacity: a
                    });
                    b.left.fill({
                        color: c,
                        opacity: a
                    });
                    b.right.fill({
                        color: e,
                        opacity: a
                    });
                    b.top.fill({
                        color: d,
                        opacity: a
                    });
                    b.cap.fill({
                        color: f,
                        opacity: a
                    });
                    b.front.fill(k);
                    b.top.stroke({
                        color: d,
                        thickness: .8
                    })
                },
                Bb: i$,
                zb: "value",
                yb: "zero"
            };
            h$.bar = {
                Db: 7,
                Ib: 2,
                Kb: [Ota, b$, c$, d$, e$, $.YH, f$, Pta, Qta],
                Nb: null,
                Hb: Gta,
                Bb: i$,
                zb: "value",
                yb: "zero"
            };
            h$.column = {
                Db: 7,
                Ib: 2,
                Kb: [Ota, b$, c$, d$, e$, $.YH, f$, Pta, Qta],
                Nb: null,
                Hb: Gta,
                Bb: i$,
                zb: "value",
                yb: "zero"
            };
            h$.line = {
                Db: 33,
                Ib: 1,
                Kb: [{
                    name: "path",
                    Pb: "path",
                    Wb: null,
                    Xb: null,
                    Zb: !1,
                    Gb: !1,
                    zIndex: 0
                }],
                Nb: null,
                Hb: function (a, b, c) {
                    c = $.dm("fill", 1, !0)(a, c);
                    a = $.C(c) ? c.opacity : 1;
                    c = $.C(c) ? c.color : c;
                    c = $.Ml(c);
                    null === c ? c = "none" : (c = c.tk, c = $.Cl(c), c = $.Wb($.Il(c, $.Jl(c, .3), .7)), c = $.Ql(c, .2));
                    b.path.fill({
                        color: c,
                        opacity: a
                    }).stroke({
                        color: c,
                        thickness: .8
                    })
                },
                Bb: i$,
                zb: "value",
                yb: "value"
            };
            h$["line-2d"] = {
                Db: 8,
                Ib: 1,
                Kb: [{
                    name: "stroke",
                    Pb: "path",
                    Wb: null,
                    Xb: "stroke",
                    Zb: !0,
                    Gb: !1,
                    zIndex: 9E-6
                }],
                Nb: null,
                Hb: null,
                Bb: i$ | 2097152,
                zb: "value",
                yb: "value"
            };
            X9.prototype.gj = h$;
            $.Pz(X9, X9.prototype.gj);
            $.Xp["cartesian-3d"] = Hta;
            $.g = X9.prototype;
            $.g.Ps = function (a) {
                return $.Ak(Nta, a, "column")
            };
            $.g.pN = function () {
                return !0
            };
            $.g.KM = function (a, b) {
                if (b || !this.g("zDistribution")) var c = 0;
                else c = Z9(this), a = Ita(this, a), c = c - a - 1, c *= $9(this, b) + this.i;
                return c
            };
            $.g.LM = function (a, b) {
                if (b || !this.g("zDistribution")) var c = 0;
                else c = Z9(this), a = Ita(this, a), c = c - a - 1, c *= a$(this, b) + this.j;
                return c
            };
            $.g.uF = function () {
                return new P9
            };
            $.g.VZ = function () {
                var a = new R9;
                a.oa = this;
                return a
            };
            $.g.WZ = function () {
                var a = new S9;
                a.oa = this;
                return a
            };
            $.g.XZ = function () {
                var a = new T9;
                a.oa = this;
                return a
            };
            $.g.UW = function () {
                this.p3 = {};
                for (var a = this.Te(), b, c = "none" != this.ab().gn(), d = "direct" == this.ab().ix(), e = [30], f = !0, h = 1; h < a.length; h++) a[h].La() == a[h - 1].La() ? e.push(e[h - 1]) : (e.push(30 + (1 - 1 / (h + 1))), f = !1);
                for (h = 0; h < a.length; h++) {
                    var k = 30 + (1 - 1 / (h + 1));
                    b = a.length - h - 1;
                    var l = c && d ? b : h;
                    if ((b = a[l]) && b.enabled())
                        if (b.check($.sB)) {
                            if (b.eh())
                                for (l = b.Ac(); l.advance();) {
                                    var m = b,
                                        p = h;
                                    var q = a.length;
                                    var r = e[h],
                                        t = f,
                                        u = m.$(),
                                        v = $.N(u.get("value")),
                                        w = u.la();
                                    p += 1;
                                    var x = .01,
                                        y = "none" != this.ab().gn(),
                                        B = this.Qa().Ne();
                                    w = B ? u.Jb() -
                                        w : w + 1;
                                    r = this.g("zDistribution") ? 30 + (1 - 1 / p) : t ? 30 : r;
                                    this.ab().Ne() ^ 0 > v && (p = -p);
                                    m.g("isVertical") ? y || this.g("zDistribution") ? (m = w, w = p, p = m, m = 1 - 1 / Math.abs(w), r = 0 < w ? r + x * (p + m) : r - x * (q - p + m)) : (B && (p = q - Math.abs(p) + 1), w = w * q - q + Math.abs(p), x *= w, r += x, this.ab().Ne() && (v = -v), 0 > v && (x = -x), r += x) : (y || this.g("zDistribution") || (B && (p = q - Math.abs(p) + 1), w = w * q - q + Math.abs(p)), x *= w, r += x);
                                    u.o("zIndex", r);
                                    u.o("directIndex", w * p);
                                    q = r;
                                    k < q && (k = q)
                                } else b.zIndex() != b.xh && b.zIndex() != k && (k = b.zIndex()), b.vP() && (this.p3[Dta(b)] = l);
                            b.zIndex(k)
                        } else k =
                            1E-5 * b.wh() + 32, b.xh = k
                }
            };
            $.g.G1 = function (a) {
                a = a.clone().round();
                var b = this.aD(a),
                    c = Z9(this),
                    d = this.g("zAngle"),
                    e = this.g("zAspect"),
                    f = this.g("zPadding"),
                    h = this.g("zDistribution"),
                    k = $.bb(d);
                d = $.bb(90 - d);
                if ($.zo(e)) {
                    var l = (0, window.parseFloat)(e) / 100;
                    e = l * Math.sin(d);
                    for (var m = l * Math.sin(k), p = l = 0, q = this.Te(), r, t = 0; t < q.length; t++)
                        if ((r = q[t]) && r.enabled() && r.check($.sB)) {
                            var u = r.Qa();
                            u = 1 / ("ordinal" == u.La() ? u.values().length : r.$().Jb());
                            var v = this.g("barsPadding");
                            var w = this.g("barGroupsPadding");
                            v = r.gh() || h ? 1 / (1 + w) : 1 / (c + (c - 1) *
                                v + w);
                            u *= v;
                            !r.gh() && h ? (l += u * e, p += u * m) : l || (l = u * e, p = u * m)
                        } this.i = Math.round(f * Math.sin(d));
                    this.j = Math.round(f * Math.sin(k));
                    f = this.Hs ? b.height / (1 + l) : b.width / (1 + l);
                    this.li = f * l;
                    this.Jh = f * p;
                    !this.wD && h && (this.li += this.i * (c - 1), this.Jh += this.j * (c - 1));
                    this.li = Math.round(this.li);
                    this.Jh = Math.round(this.Jh)
                } else this.K = !this.wD && h ? e * c + f * (c - 1) : $.N(e), this.li = Math.round(this.K * Math.sin(d)), this.Jh = Math.round(this.K * Math.sin(k)), h = c - 1, f * h >= this.K && (f = (this.K - c) / h), this.i = Math.round(f * Math.sin(d)), this.j = Math.round(f *
                    Math.sin(k));
                this.li = Math.max(this.li, 0) || 0;
                this.Jh = Math.max(this.Jh, 0) || 0;
                this.i = Math.max(this.i, 0) || 0;
                this.j = Math.max(this.j, 0) || 0;
                a.top += this.Jh;
                a.height -= this.Jh;
                a.width -= this.li;
                return a
            };
            $.g.LL = function (a, b, c) {
                if (!this.wD && this.g("zDistribution")) {
                    if (0 < a) {
                        a = 1 + this.g("barGroupsPadding");
                        for (var d = 1 / a, e = 0; e < b.length; e++) a = b[e].X, a.check(262144) && c ^ a.g("isVertical") && ($.kB(a, .5), $.jB(a, d))
                    }
                } else X9.u.LL.call(this, a, b, c)
            };
            $.g.hg = function (a) {
                var b = $.xo(a.target);
                return (b = b && b.X) && !b.ld && b.enabled() ? b.hg(a) : X9.u.hg.call(this, a)
            };
            $.g.U = function (a, b) {
                X9.u.U.call(this, a, b)
            };
            var j$ = X9.prototype;
            $.F("anychart.cartesian3d", Hta);
            j$.xScale = j$.Qa;
            j$.yScale = j$.ab;
            j$.crosshair = j$.lh;
            j$.xGrid = j$.hm;
            j$.yGrid = j$.jm;
            j$.xMinorGrid = j$.Mr;
            j$.yMinorGrid = j$.Pr;
            j$.xAxis = j$.Xh;
            j$.getXAxesCount = j$.nD;
            j$.yAxis = j$.jj;
            j$.getYAxesCount = j$.pD;
            j$.getSeries = j$.ef;
            j$.zIndex = j$.zIndex;
            j$.lineMarker = j$.Wm;
            j$.rangeMarker = j$.en;
            j$.textMarker = j$.kn;
            j$.palette = j$.ac;
            j$.markerPalette = j$.Hf;
            j$.hatchFillPalette = j$.ue;
            j$.getType = j$.La;
            j$.addSeries = j$.jl;
            j$.getSeriesAt = j$.yi;
            j$.getSeriesCount = j$.uj;
            j$.removeSeries = j$.xo;
            j$.removeSeriesAt = j$.Pn;
            j$.removeAllSeries = j$.Ap;
            j$.getPlotBounds = j$.Yf;
            j$.xZoom = j$.Rq;
            j$.yZoom = j$.Sq;
            j$.xScroller = j$.Kp;
            j$.yScroller = j$.Qr;
            j$.getStat = j$.Qg;
            j$.getXScales = j$.ty;
            j$.getYScales = j$.vy;
            $.Xp["area-3d"] = Jta;
            $.Xp["bar-3d"] = Kta;
            $.Xp["column-3d"] = Lta;
            $.Xp["line-3d"] = Mta;
            $.F("anychart.area3d", Jta);
            $.F("anychart.bar3d", Kta);
            $.F("anychart.column3d", Lta);
            $.F("anychart.line3d", Mta);
        }).call(this, $)
    }
    if (!_.theme_cartesian_3d) {
        _.theme_cartesian_3d = 1;
        (function ($) {
            $.ra($.fa.anychart.themes.defaultTheme, {
                cartesian3dBase: {
                    zAngle: 45,
                    zAspect: "50%",
                    zDistribution: !1,
                    zPadding: 10,
                    defaultSeriesSettings: {
                        base: {
                            normal: {
                                stroke: "none",
                                fill: $.EN
                            },
                            hovered: {
                                stroke: "none",
                                fill: $.KN
                            },
                            selected: {
                                stroke: "none",
                                fill: "#333"
                            },
                            tooltip: {
                                anchor: "left-top",
                                position: "left-top"
                            }
                        },
                        area: {
                            hovered: {
                                markers: {
                                    enabled: !0
                                }
                            },
                            selected: {
                                markers: {
                                    enabled: !0
                                }
                            }
                        },
                        bar: {
                            isVertical: !0
                        },
                        line: {
                            hovered: {
                                markers: {
                                    enabled: !0
                                }
                            },
                            selected: {
                                markers: {
                                    enabled: !0
                                }
                            }
                        },
                        line2d: {
                            normal: {
                                stroke: $.EN
                            },
                            hovered: {
                                stroke: $.KN,
                                markers: {
                                    enabled: !0
                                }
                            },
                            selected: {
                                stroke: "#333",
                                markers: {
                                    enabled: !0
                                }
                            }
                        }
                    }
                },
                bar3d: {
                    xGrids: [{}],
                    yGrids: [{
                        enabled: !0,
                        scale: 0
                    }],
                    yScale: {
                        stackDirection: "reverse"
                    }
                },
                column3d: {
                    defaultSeriesType: "column"
                },
                area3d: {
                    defaultSeriesType: "area",
                    zDistribution: !0,
                    zPadding: 5
                },
                line3d: {
                    defaultSeriesType: "line",
                    zDistribution: !0,
                    zPadding: 5
                },
                cartesian3d: {
                    defaultSeriesType: "column",
                    xGrids: [{
                        enabled: !0,
                        scale: 0
                    }],
                    yGrids: [{}]
                }
            });
        }).call(this, $)
    }
    $_ = window.anychart;
    $_.$ = $;
    $_._ = _
});