if (function(t, e) {
    "object" == typeof module && "object" == typeof module.exports ? module.exports = t.document ? e(t, !0) : function(t) {
        if (!t.document)
            throw new Error("jQuery requires a window with a document");
        return e(t)
    }
    : e(t)
}("undefined" != typeof window ? window : this, function(t, e) {
    var i = []
      , n = i.slice
      , o = i.concat
      , s = i.push
      , r = i.indexOf
      , a = {}
      , l = a.toString
      , c = a.hasOwnProperty
      , d = {}
      , p = "1.11.1"
      , u = function(t, e) {
        return new u.fn.init(t,e)
    }
      , h = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g
      , f = /^-ms-/
      , m = /-([\da-z])/gi
      , g = function(t, e) {
        return e.toUpperCase()
    };
    function v(t) {
        var e = t.length
          , i = u.type(t);
        return "function" !== i && !u.isWindow(t) && (!(1 !== t.nodeType || !e) || ("array" === i || 0 === e || "number" == typeof e && e > 0 && e - 1 in t))
    }
    u.fn = u.prototype = {
        jquery: p,
        constructor: u,
        selector: "",
        length: 0,
        toArray: function() {
            return n.call(this)
        },
        get: function(t) {
            return null != t ? 0 > t ? this[t + this.length] : this[t] : n.call(this)
        },
        pushStack: function(t) {
            var e = u.merge(this.constructor(), t);
            return e.prevObject = this,
            e.context = this.context,
            e
        },
        each: function(t, e) {
            return u.each(this, t, e)
        },
        map: function(t) {
            return this.pushStack(u.map(this, function(e, i) {
                return t.call(e, i, e)
            }))
        },
        slice: function() {
            return this.pushStack(n.apply(this, arguments))
        },
        first: function() {
            return this.eq(0)
        },
        last: function() {
            return this.eq(-1)
        },
        eq: function(t) {
            var e = this.length
              , i = +t + (0 > t ? e : 0);
            return this.pushStack(i >= 0 && e > i ? [this[i]] : [])
        },
        end: function() {
            return this.prevObject || this.constructor(null)
        },
        push: s,
        sort: i.sort,
        splice: i.splice
    },
    u.extend = u.fn.extend = function() {
        var t, e, i, n, o, s, r = arguments[0] || {}, a = 1, l = arguments.length, c = !1;
        for ("boolean" == typeof r && (c = r,
        r = arguments[a] || {},
        a++),
        "object" == typeof r || u.isFunction(r) || (r = {}),
        a === l && (r = this,
        a--); l > a; a++)
            if (null != (o = arguments[a]))
                for (n in o)
                    t = r[n],
                    r !== (i = o[n]) && (c && i && (u.isPlainObject(i) || (e = u.isArray(i))) ? (e ? (e = !1,
                    s = t && u.isArray(t) ? t : []) : s = t && u.isPlainObject(t) ? t : {},
                    r[n] = u.extend(c, s, i)) : void 0 !== i && (r[n] = i));
        return r
    }
    ,
    u.extend({
        expando: "jQuery" + (p + Math.random()).replace(/\D/g, ""),
        isReady: !0,
        error: function(t) {
            throw new Error(t)
        },
        noop: function() {},
        isFunction: function(t) {
            return "function" === u.type(t)
        },
        isArray: Array.isArray || function(t) {
            return "array" === u.type(t)
        }
        ,
        isWindow: function(t) {
            return null != t && t == t.window
        },
        isNumeric: function(t) {
            return !u.isArray(t) && t - parseFloat(t) >= 0
        },
        isEmptyObject: function(t) {
            var e;
            for (e in t)
                return !1;
            return !0
        },
        isPlainObject: function(t) {
            var e;
            if (!t || "object" !== u.type(t) || t.nodeType || u.isWindow(t))
                return !1;
            try {
                if (t.constructor && !c.call(t, "constructor") && !c.call(t.constructor.prototype, "isPrototypeOf"))
                    return !1
            } catch (t) {
                return !1
            }
            if (d.ownLast)
                for (e in t)
                    return c.call(t, e);
            for (e in t)
                ;
            return void 0 === e || c.call(t, e)
        },
        type: function(t) {
            return null == t ? t + "" : "object" == typeof t || "function" == typeof t ? a[l.call(t)] || "object" : typeof t
        },
        globalEval: function(e) {
            e && u.trim(e) && (t.execScript || function(e) {
                t.eval.call(t, e)
            }
            )(e)
        },
        camelCase: function(t) {
            return t.replace(f, "ms-").replace(m, g)
        },
        nodeName: function(t, e) {
            return t.nodeName && t.nodeName.toLowerCase() === e.toLowerCase()
        },
        each: function(t, e, i) {
            var n = 0
              , o = t.length
              , s = v(t);
            if (i) {
                if (s)
                    for (; o > n && !1 !== e.apply(t[n], i); n++)
                        ;
                else
                    for (n in t)
                        if (!1 === e.apply(t[n], i))
                            break
            } else if (s)
                for (; o > n && !1 !== e.call(t[n], n, t[n]); n++)
                    ;
            else
                for (n in t)
                    if (!1 === e.call(t[n], n, t[n]))
                        break;
            return t
        },
        trim: function(t) {
            return null == t ? "" : (t + "").replace(h, "")
        },
        makeArray: function(t, e) {
            var i = e || [];
            return null != t && (v(Object(t)) ? u.merge(i, "string" == typeof t ? [t] : t) : s.call(i, t)),
            i
        },
        inArray: function(t, e, i) {
            var n;
            if (e) {
                if (r)
                    return r.call(e, t, i);
                for (n = e.length,
                i = i ? 0 > i ? Math.max(0, n + i) : i : 0; n > i; i++)
                    if (i in e && e[i] === t)
                        return i
            }
            return -1
        },
        merge: function(t, e) {
            for (var i = +e.length, n = 0, o = t.length; i > n; )
                t[o++] = e[n++];
            if (i != i)
                for (; void 0 !== e[n]; )
                    t[o++] = e[n++];
            return t.length = o,
            t
        },
        grep: function(t, e, i) {
            for (var n = [], o = 0, s = t.length, r = !i; s > o; o++)
                !e(t[o], o) !== r && n.push(t[o]);
            return n
        },
        map: function(t, e, i) {
            var n, s = 0, r = t.length, a = [];
            if (v(t))
                for (; r > s; s++)
                    null != (n = e(t[s], s, i)) && a.push(n);
            else
                for (s in t)
                    null != (n = e(t[s], s, i)) && a.push(n);
            return o.apply([], a)
        },
        guid: 1,
        proxy: function(t, e) {
            var i, o, s;
            return "string" == typeof e && (s = t[e],
            e = t,
            t = s),
            u.isFunction(t) ? (i = n.call(arguments, 2),
            (o = function() {
                return t.apply(e || this, i.concat(n.call(arguments)))
            }
            ).guid = t.guid = t.guid || u.guid++,
            o) : void 0
        },
        now: function() {
            return +new Date
        },
        support: d
    }),
    u.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(t, e) {
        a["[object " + e + "]"] = e.toLowerCase()
    });
    var y = function(t) {
        var e, i, n, o, s, r, a, l, c, d, p, u, h, f, m, g, v, y, b, w = "sizzle" + -new Date, x = t.document, T = 0, k = 0, C = st(), S = st(), $ = st(), E = function(t, e) {
            return t === e && (p = !0),
            0
        }, I = "undefined", A = 1 << 31, _ = {}.hasOwnProperty, N = [], P = N.pop, D = N.push, O = N.push, j = N.slice, L = N.indexOf || function(t) {
            for (var e = 0, i = this.length; i > e; e++)
                if (this[e] === t)
                    return e;
            return -1
        }
        , H = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped", M = "[\\x20\\t\\r\\n\\f]", z = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+", W = z.replace("w", "w#"), R = "\\[" + M + "*(" + z + ")(?:" + M + "*([*^$|!~]?=)" + M + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + W + "))|)" + M + "*\\]", F = ":(" + z + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + R + ")*)|.*)\\)|)", B = new RegExp("^" + M + "+|((?:^|[^\\\\])(?:\\\\.)*)" + M + "+$","g"), q = new RegExp("^" + M + "*," + M + "*"), U = new RegExp("^" + M + "*([>+~]|" + M + ")" + M + "*"), X = new RegExp("=" + M + "*([^\\]'\"]*?)" + M + "*\\]","g"), V = new RegExp(F), Y = new RegExp("^" + W + "$"), Q = {
            ID: new RegExp("^#(" + z + ")"),
            CLASS: new RegExp("^\\.(" + z + ")"),
            TAG: new RegExp("^(" + z.replace("w", "w*") + ")"),
            ATTR: new RegExp("^" + R),
            PSEUDO: new RegExp("^" + F),
            CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + M + "*(even|odd|(([+-]|)(\\d*)n|)" + M + "*(?:([+-]|)" + M + "*(\\d+)|))" + M + "*\\)|)","i"),
            bool: new RegExp("^(?:" + H + ")$","i"),
            needsContext: new RegExp("^" + M + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + M + "*((?:-\\d)?\\d*)" + M + "*\\)|)(?=[^-]|$)","i")
        }, K = /^(?:input|select|textarea|button)$/i, Z = /^h\d$/i, G = /^[^{]+\{\s*\[native \w/, J = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, tt = /[+~]/, et = /'|\\/g, it = new RegExp("\\\\([\\da-f]{1,6}" + M + "?|(" + M + ")|.)","ig"), nt = function(t, e, i) {
            var n = "0x" + e - 65536;
            return n != n || i ? e : 0 > n ? String.fromCharCode(n + 65536) : String.fromCharCode(n >> 10 | 55296, 1023 & n | 56320)
        };
        try {
            O.apply(N = j.call(x.childNodes), x.childNodes),
            N[x.childNodes.length].nodeType
        } catch (t) {
            O = {
                apply: N.length ? function(t, e) {
                    D.apply(t, j.call(e))
                }
                : function(t, e) {
                    for (var i = t.length, n = 0; t[i++] = e[n++]; )
                        ;
                    t.length = i - 1
                }
            }
        }
        function ot(t, e, n, o) {
            var s, a, c, d, p, f, v, y, T, k;
            if ((e ? e.ownerDocument || e : x) !== h && u(e),
            n = n || [],
            !t || "string" != typeof t)
                return n;
            if (1 !== (d = (e = e || h).nodeType) && 9 !== d)
                return [];
            if (m && !o) {
                if (s = J.exec(t))
                    if (c = s[1]) {
                        if (9 === d) {
                            if (!(a = e.getElementById(c)) || !a.parentNode)
                                return n;
                            if (a.id === c)
                                return n.push(a),
                                n
                        } else if (e.ownerDocument && (a = e.ownerDocument.getElementById(c)) && b(e, a) && a.id === c)
                            return n.push(a),
                            n
                    } else {
                        if (s[2])
                            return O.apply(n, e.getElementsByTagName(t)),
                            n;
                        if ((c = s[3]) && i.getElementsByClassName && e.getElementsByClassName)
                            return O.apply(n, e.getElementsByClassName(c)),
                            n
                    }
                if (i.qsa && (!g || !g.test(t))) {
                    if (y = v = w,
                    T = e,
                    k = 9 === d && t,
                    1 === d && "object" !== e.nodeName.toLowerCase()) {
                        for (f = r(t),
                        (v = e.getAttribute("id")) ? y = v.replace(et, "\\$&") : e.setAttribute("id", y),
                        y = "[id='" + y + "'] ",
                        p = f.length; p--; )
                            f[p] = y + mt(f[p]);
                        T = tt.test(t) && ht(e.parentNode) || e,
                        k = f.join(",")
                    }
                    if (k)
                        try {
                            return O.apply(n, T.querySelectorAll(k)),
                            n
                        } catch (t) {} finally {
                            v || e.removeAttribute("id")
                        }
                }
            }
            return l(t.replace(B, "$1"), e, n, o)
        }
        function st() {
            var t = [];
            return function e(i, o) {
                return t.push(i + " ") > n.cacheLength && delete e[t.shift()],
                e[i + " "] = o
            }
        }
        function rt(t) {
            return t[w] = !0,
            t
        }
        function at(t) {
            var e = h.createElement("div");
            try {
                return !!t(e)
            } catch (t) {
                return !1
            } finally {
                e.parentNode && e.parentNode.removeChild(e),
                e = null
            }
        }
        function lt(t, e) {
            for (var i = t.split("|"), o = t.length; o--; )
                n.attrHandle[i[o]] = e
        }
        function ct(t, e) {
            var i = e && t
              , n = i && 1 === t.nodeType && 1 === e.nodeType && (~e.sourceIndex || A) - (~t.sourceIndex || A);
            if (n)
                return n;
            if (i)
                for (; i = i.nextSibling; )
                    if (i === e)
                        return -1;
            return t ? 1 : -1
        }
        function dt(t) {
            return function(e) {
                return "input" === e.nodeName.toLowerCase() && e.type === t
            }
        }
        function pt(t) {
            return function(e) {
                var i = e.nodeName.toLowerCase();
                return ("input" === i || "button" === i) && e.type === t
            }
        }
        function ut(t) {
            return rt(function(e) {
                return e = +e,
                rt(function(i, n) {
                    for (var o, s = t([], i.length, e), r = s.length; r--; )
                        i[o = s[r]] && (i[o] = !(n[o] = i[o]))
                })
            })
        }
        function ht(t) {
            return t && typeof t.getElementsByTagName !== I && t
        }
        for (e in i = ot.support = {},
        s = ot.isXML = function(t) {
            var e = t && (t.ownerDocument || t).documentElement;
            return !!e && "HTML" !== e.nodeName
        }
        ,
        u = ot.setDocument = function(t) {
            var e, o = t ? t.ownerDocument || t : x, r = o.defaultView;
            return o !== h && 9 === o.nodeType && o.documentElement ? (h = o,
            f = o.documentElement,
            m = !s(o),
            r && r !== r.top && (r.addEventListener ? r.addEventListener("unload", function() {
                u()
            }, !1) : r.attachEvent && r.attachEvent("onunload", function() {
                u()
            })),
            i.attributes = at(function(t) {
                return t.className = "i",
                !t.getAttribute("className")
            }),
            i.getElementsByTagName = at(function(t) {
                return t.appendChild(o.createComment("")),
                !t.getElementsByTagName("*").length
            }),
            i.getElementsByClassName = G.test(o.getElementsByClassName) && at(function(t) {
                return t.innerHTML = "<div class='a'></div><div class='a i'></div>",
                t.firstChild.className = "i",
                2 === t.getElementsByClassName("i").length
            }),
            i.getById = at(function(t) {
                return f.appendChild(t).id = w,
                !o.getElementsByName || !o.getElementsByName(w).length
            }),
            i.getById ? (n.find.ID = function(t, e) {
                if (typeof e.getElementById !== I && m) {
                    var i = e.getElementById(t);
                    return i && i.parentNode ? [i] : []
                }
            }
            ,
            n.filter.ID = function(t) {
                var e = t.replace(it, nt);
                return function(t) {
                    return t.getAttribute("id") === e
                }
            }
            ) : (delete n.find.ID,
            n.filter.ID = function(t) {
                var e = t.replace(it, nt);
                return function(t) {
                    var i = typeof t.getAttributeNode !== I && t.getAttributeNode("id");
                    return i && i.value === e
                }
            }
            ),
            n.find.TAG = i.getElementsByTagName ? function(t, e) {
                return typeof e.getElementsByTagName !== I ? e.getElementsByTagName(t) : void 0
            }
            : function(t, e) {
                var i, n = [], o = 0, s = e.getElementsByTagName(t);
                if ("*" === t) {
                    for (; i = s[o++]; )
                        1 === i.nodeType && n.push(i);
                    return n
                }
                return s
            }
            ,
            n.find.CLASS = i.getElementsByClassName && function(t, e) {
                return typeof e.getElementsByClassName !== I && m ? e.getElementsByClassName(t) : void 0
            }
            ,
            v = [],
            g = [],
            (i.qsa = G.test(o.querySelectorAll)) && (at(function(t) {
                t.innerHTML = "<select msallowclip=''><option selected=''></option></select>",
                t.querySelectorAll("[msallowclip^='']").length && g.push("[*^$]=" + M + "*(?:''|\"\")"),
                t.querySelectorAll("[selected]").length || g.push("\\[" + M + "*(?:value|" + H + ")"),
                t.querySelectorAll(":checked").length || g.push(":checked")
            }),
            at(function(t) {
                var e = o.createElement("input");
                e.setAttribute("type", "hidden"),
                t.appendChild(e).setAttribute("name", "D"),
                t.querySelectorAll("[name=d]").length && g.push("name" + M + "*[*^$|!~]?="),
                t.querySelectorAll(":enabled").length || g.push(":enabled", ":disabled"),
                t.querySelectorAll("*,:x"),
                g.push(",.*:")
            })),
            (i.matchesSelector = G.test(y = f.matches || f.webkitMatchesSelector || f.mozMatchesSelector || f.oMatchesSelector || f.msMatchesSelector)) && at(function(t) {
                i.disconnectedMatch = y.call(t, "div"),
                y.call(t, "[s!='']:x"),
                v.push("!=", F)
            }),
            g = g.length && new RegExp(g.join("|")),
            v = v.length && new RegExp(v.join("|")),
            e = G.test(f.compareDocumentPosition),
            b = e || G.test(f.contains) ? function(t, e) {
                var i = 9 === t.nodeType ? t.documentElement : t
                  , n = e && e.parentNode;
                return t === n || !(!n || 1 !== n.nodeType || !(i.contains ? i.contains(n) : t.compareDocumentPosition && 16 & t.compareDocumentPosition(n)))
            }
            : function(t, e) {
                if (e)
                    for (; e = e.parentNode; )
                        if (e === t)
                            return !0;
                return !1
            }
            ,
            E = e ? function(t, e) {
                if (t === e)
                    return p = !0,
                    0;
                var n = !t.compareDocumentPosition - !e.compareDocumentPosition;
                return n || (1 & (n = (t.ownerDocument || t) === (e.ownerDocument || e) ? t.compareDocumentPosition(e) : 1) || !i.sortDetached && e.compareDocumentPosition(t) === n ? t === o || t.ownerDocument === x && b(x, t) ? -1 : e === o || e.ownerDocument === x && b(x, e) ? 1 : d ? L.call(d, t) - L.call(d, e) : 0 : 4 & n ? -1 : 1)
            }
            : function(t, e) {
                if (t === e)
                    return p = !0,
                    0;
                var i, n = 0, s = t.parentNode, r = e.parentNode, a = [t], l = [e];
                if (!s || !r)
                    return t === o ? -1 : e === o ? 1 : s ? -1 : r ? 1 : d ? L.call(d, t) - L.call(d, e) : 0;
                if (s === r)
                    return ct(t, e);
                for (i = t; i = i.parentNode; )
                    a.unshift(i);
                for (i = e; i = i.parentNode; )
                    l.unshift(i);
                for (; a[n] === l[n]; )
                    n++;
                return n ? ct(a[n], l[n]) : a[n] === x ? -1 : l[n] === x ? 1 : 0
            }
            ,
            o) : h
        }
        ,
        ot.matches = function(t, e) {
            return ot(t, null, null, e)
        }
        ,
        ot.matchesSelector = function(t, e) {
            if ((t.ownerDocument || t) !== h && u(t),
            e = e.replace(X, "='$1']"),
            !(!i.matchesSelector || !m || v && v.test(e) || g && g.test(e)))
                try {
                    var n = y.call(t, e);
                    if (n || i.disconnectedMatch || t.document && 11 !== t.document.nodeType)
                        return n
                } catch (t) {}
            return ot(e, h, null, [t]).length > 0
        }
        ,
        ot.contains = function(t, e) {
            return (t.ownerDocument || t) !== h && u(t),
            b(t, e)
        }
        ,
        ot.attr = function(t, e) {
            (t.ownerDocument || t) !== h && u(t);
            var o = n.attrHandle[e.toLowerCase()]
              , s = o && _.call(n.attrHandle, e.toLowerCase()) ? o(t, e, !m) : void 0;
            return void 0 !== s ? s : i.attributes || !m ? t.getAttribute(e) : (s = t.getAttributeNode(e)) && s.specified ? s.value : null
        }
        ,
        ot.error = function(t) {
            throw new Error("Syntax error, unrecognized expression: " + t)
        }
        ,
        ot.uniqueSort = function(t) {
            var e, n = [], o = 0, s = 0;
            if (p = !i.detectDuplicates,
            d = !i.sortStable && t.slice(0),
            t.sort(E),
            p) {
                for (; e = t[s++]; )
                    e === t[s] && (o = n.push(s));
                for (; o--; )
                    t.splice(n[o], 1)
            }
            return d = null,
            t
        }
        ,
        o = ot.getText = function(t) {
            var e, i = "", n = 0, s = t.nodeType;
            if (s) {
                if (1 === s || 9 === s || 11 === s) {
                    if ("string" == typeof t.textContent)
                        return t.textContent;
                    for (t = t.firstChild; t; t = t.nextSibling)
                        i += o(t)
                } else if (3 === s || 4 === s)
                    return t.nodeValue
            } else
                for (; e = t[n++]; )
                    i += o(e);
            return i
        }
        ,
        (n = ot.selectors = {
            cacheLength: 50,
            createPseudo: rt,
            match: Q,
            attrHandle: {},
            find: {},
            relative: {
                ">": {
                    dir: "parentNode",
                    first: !0
                },
                " ": {
                    dir: "parentNode"
                },
                "+": {
                    dir: "previousSibling",
                    first: !0
                },
                "~": {
                    dir: "previousSibling"
                }
            },
            preFilter: {
                ATTR: function(t) {
                    return t[1] = t[1].replace(it, nt),
                    t[3] = (t[3] || t[4] || t[5] || "").replace(it, nt),
                    "~=" === t[2] && (t[3] = " " + t[3] + " "),
                    t.slice(0, 4)
                },
                CHILD: function(t) {
                    return t[1] = t[1].toLowerCase(),
                    "nth" === t[1].slice(0, 3) ? (t[3] || ot.error(t[0]),
                    t[4] = +(t[4] ? t[5] + (t[6] || 1) : 2 * ("even" === t[3] || "odd" === t[3])),
                    t[5] = +(t[7] + t[8] || "odd" === t[3])) : t[3] && ot.error(t[0]),
                    t
                },
                PSEUDO: function(t) {
                    var e, i = !t[6] && t[2];
                    return Q.CHILD.test(t[0]) ? null : (t[3] ? t[2] = t[4] || t[5] || "" : i && V.test(i) && (e = r(i, !0)) && (e = i.indexOf(")", i.length - e) - i.length) && (t[0] = t[0].slice(0, e),
                    t[2] = i.slice(0, e)),
                    t.slice(0, 3))
                }
            },
            filter: {
                TAG: function(t) {
                    var e = t.replace(it, nt).toLowerCase();
                    return "*" === t ? function() {
                        return !0
                    }
                    : function(t) {
                        return t.nodeName && t.nodeName.toLowerCase() === e
                    }
                },
                CLASS: function(t) {
                    var e = C[t + " "];
                    return e || (e = new RegExp("(^|" + M + ")" + t + "(" + M + "|$)")) && C(t, function(t) {
                        return e.test("string" == typeof t.className && t.className || typeof t.getAttribute !== I && t.getAttribute("class") || "")
                    })
                },
                ATTR: function(t, e, i) {
                    return function(n) {
                        var o = ot.attr(n, t);
                        return null == o ? "!=" === e : !e || (o += "",
                        "=" === e ? o === i : "!=" === e ? o !== i : "^=" === e ? i && 0 === o.indexOf(i) : "*=" === e ? i && o.indexOf(i) > -1 : "$=" === e ? i && o.slice(-i.length) === i : "~=" === e ? (" " + o + " ").indexOf(i) > -1 : "|=" === e && (o === i || o.slice(0, i.length + 1) === i + "-"))
                    }
                },
                CHILD: function(t, e, i, n, o) {
                    var s = "nth" !== t.slice(0, 3)
                      , r = "last" !== t.slice(-4)
                      , a = "of-type" === e;
                    return 1 === n && 0 === o ? function(t) {
                        return !!t.parentNode
                    }
                    : function(e, i, l) {
                        var c, d, p, u, h, f, m = s !== r ? "nextSibling" : "previousSibling", g = e.parentNode, v = a && e.nodeName.toLowerCase(), y = !l && !a;
                        if (g) {
                            if (s) {
                                for (; m; ) {
                                    for (p = e; p = p[m]; )
                                        if (a ? p.nodeName.toLowerCase() === v : 1 === p.nodeType)
                                            return !1;
                                    f = m = "only" === t && !f && "nextSibling"
                                }
                                return !0
                            }
                            if (f = [r ? g.firstChild : g.lastChild],
                            r && y) {
                                for (h = (c = (d = g[w] || (g[w] = {}))[t] || [])[0] === T && c[1],
                                u = c[0] === T && c[2],
                                p = h && g.childNodes[h]; p = ++h && p && p[m] || (u = h = 0) || f.pop(); )
                                    if (1 === p.nodeType && ++u && p === e) {
                                        d[t] = [T, h, u];
                                        break
                                    }
                            } else if (y && (c = (e[w] || (e[w] = {}))[t]) && c[0] === T)
                                u = c[1];
                            else
                                for (; (p = ++h && p && p[m] || (u = h = 0) || f.pop()) && ((a ? p.nodeName.toLowerCase() !== v : 1 !== p.nodeType) || !++u || (y && ((p[w] || (p[w] = {}))[t] = [T, u]),
                                p !== e)); )
                                    ;
                            return (u -= o) === n || u % n == 0 && u / n >= 0
                        }
                    }
                },
                PSEUDO: function(t, e) {
                    var i, o = n.pseudos[t] || n.setFilters[t.toLowerCase()] || ot.error("unsupported pseudo: " + t);
                    return o[w] ? o(e) : o.length > 1 ? (i = [t, t, "", e],
                    n.setFilters.hasOwnProperty(t.toLowerCase()) ? rt(function(t, i) {
                        for (var n, s = o(t, e), r = s.length; r--; )
                            t[n = L.call(t, s[r])] = !(i[n] = s[r])
                    }) : function(t) {
                        return o(t, 0, i)
                    }
                    ) : o
                }
            },
            pseudos: {
                not: rt(function(t) {
                    var e = []
                      , i = []
                      , n = a(t.replace(B, "$1"));
                    return n[w] ? rt(function(t, e, i, o) {
                        for (var s, r = n(t, null, o, []), a = t.length; a--; )
                            (s = r[a]) && (t[a] = !(e[a] = s))
                    }) : function(t, o, s) {
                        return e[0] = t,
                        n(e, null, s, i),
                        !i.pop()
                    }
                }),
                has: rt(function(t) {
                    return function(e) {
                        return ot(t, e).length > 0
                    }
                }),
                contains: rt(function(t) {
                    return function(e) {
                        return (e.textContent || e.innerText || o(e)).indexOf(t) > -1
                    }
                }),
                lang: rt(function(t) {
                    return Y.test(t || "") || ot.error("unsupported lang: " + t),
                    t = t.replace(it, nt).toLowerCase(),
                    function(e) {
                        var i;
                        do {
                            if (i = m ? e.lang : e.getAttribute("xml:lang") || e.getAttribute("lang"))
                                return (i = i.toLowerCase()) === t || 0 === i.indexOf(t + "-")
                        } while ((e = e.parentNode) && 1 === e.nodeType);return !1
                    }
                }),
                target: function(e) {
                    var i = t.location && t.location.hash;
                    return i && i.slice(1) === e.id
                },
                root: function(t) {
                    return t === f
                },
                focus: function(t) {
                    return t === h.activeElement && (!h.hasFocus || h.hasFocus()) && !!(t.type || t.href || ~t.tabIndex)
                },
                enabled: function(t) {
                    return !1 === t.disabled
                },
                disabled: function(t) {
                    return !0 === t.disabled
                },
                checked: function(t) {
                    var e = t.nodeName.toLowerCase();
                    return "input" === e && !!t.checked || "option" === e && !!t.selected
                },
                selected: function(t) {
                    return t.parentNode && t.parentNode.selectedIndex,
                    !0 === t.selected
                },
                empty: function(t) {
                    for (t = t.firstChild; t; t = t.nextSibling)
                        if (t.nodeType < 6)
                            return !1;
                    return !0
                },
                parent: function(t) {
                    return !n.pseudos.empty(t)
                },
                header: function(t) {
                    return Z.test(t.nodeName)
                },
                input: function(t) {
                    return K.test(t.nodeName)
                },
                button: function(t) {
                    var e = t.nodeName.toLowerCase();
                    return "input" === e && "button" === t.type || "button" === e
                },
                text: function(t) {
                    var e;
                    return "input" === t.nodeName.toLowerCase() && "text" === t.type && (null == (e = t.getAttribute("type")) || "text" === e.toLowerCase())
                },
                first: ut(function() {
                    return [0]
                }),
                last: ut(function(t, e) {
                    return [e - 1]
                }),
                eq: ut(function(t, e, i) {
                    return [0 > i ? i + e : i]
                }),
                even: ut(function(t, e) {
                    for (var i = 0; e > i; i += 2)
                        t.push(i);
                    return t
                }),
                odd: ut(function(t, e) {
                    for (var i = 1; e > i; i += 2)
                        t.push(i);
                    return t
                }),
                lt: ut(function(t, e, i) {
                    for (var n = 0 > i ? i + e : i; --n >= 0; )
                        t.push(n);
                    return t
                }),
                gt: ut(function(t, e, i) {
                    for (var n = 0 > i ? i + e : i; ++n < e; )
                        t.push(n);
                    return t
                })
            }
        }).pseudos.nth = n.pseudos.eq,
        {
            radio: !0,
            checkbox: !0,
            file: !0,
            password: !0,
            image: !0
        })
            n.pseudos[e] = dt(e);
        for (e in {
            submit: !0,
            reset: !0
        })
            n.pseudos[e] = pt(e);
        function ft() {}
        function mt(t) {
            for (var e = 0, i = t.length, n = ""; i > e; e++)
                n += t[e].value;
            return n
        }
        function gt(t, e, i) {
            var n = e.dir
              , o = i && "parentNode" === n
              , s = k++;
            return e.first ? function(e, i, s) {
                for (; e = e[n]; )
                    if (1 === e.nodeType || o)
                        return t(e, i, s)
            }
            : function(e, i, r) {
                var a, l, c = [T, s];
                if (r) {
                    for (; e = e[n]; )
                        if ((1 === e.nodeType || o) && t(e, i, r))
                            return !0
                } else
                    for (; e = e[n]; )
                        if (1 === e.nodeType || o) {
                            if ((a = (l = e[w] || (e[w] = {}))[n]) && a[0] === T && a[1] === s)
                                return c[2] = a[2];
                            if (l[n] = c,
                            c[2] = t(e, i, r))
                                return !0
                        }
            }
        }
        function vt(t) {
            return t.length > 1 ? function(e, i, n) {
                for (var o = t.length; o--; )
                    if (!t[o](e, i, n))
                        return !1;
                return !0
            }
            : t[0]
        }
        function yt(t, e, i, n, o) {
            for (var s, r = [], a = 0, l = t.length, c = null != e; l > a; a++)
                (s = t[a]) && (!i || i(s, n, o)) && (r.push(s),
                c && e.push(a));
            return r
        }
        function bt(t, e, i, n, o, s) {
            return n && !n[w] && (n = bt(n)),
            o && !o[w] && (o = bt(o, s)),
            rt(function(s, r, a, l) {
                var c, d, p, u = [], h = [], f = r.length, m = s || function(t, e, i) {
                    for (var n = 0, o = e.length; o > n; n++)
                        ot(t, e[n], i);
                    return i
                }(e || "*", a.nodeType ? [a] : a, []), g = !t || !s && e ? m : yt(m, u, t, a, l), v = i ? o || (s ? t : f || n) ? [] : r : g;
                if (i && i(g, v, a, l),
                n)
                    for (c = yt(v, h),
                    n(c, [], a, l),
                    d = c.length; d--; )
                        (p = c[d]) && (v[h[d]] = !(g[h[d]] = p));
                if (s) {
                    if (o || t) {
                        if (o) {
                            for (c = [],
                            d = v.length; d--; )
                                (p = v[d]) && c.push(g[d] = p);
                            o(null, v = [], c, l)
                        }
                        for (d = v.length; d--; )
                            (p = v[d]) && (c = o ? L.call(s, p) : u[d]) > -1 && (s[c] = !(r[c] = p))
                    }
                } else
                    v = yt(v === r ? v.splice(f, v.length) : v),
                    o ? o(null, r, v, l) : O.apply(r, v)
            })
        }
        function wt(t) {
            for (var e, i, o, s = t.length, r = n.relative[t[0].type], a = r || n.relative[" "], l = r ? 1 : 0, d = gt(function(t) {
                return t === e
            }, a, !0), p = gt(function(t) {
                return L.call(e, t) > -1
            }, a, !0), u = [function(t, i, n) {
                return !r && (n || i !== c) || ((e = i).nodeType ? d(t, i, n) : p(t, i, n))
            }
            ]; s > l; l++)
                if (i = n.relative[t[l].type])
                    u = [gt(vt(u), i)];
                else {
                    if ((i = n.filter[t[l].type].apply(null, t[l].matches))[w]) {
                        for (o = ++l; s > o && !n.relative[t[o].type]; o++)
                            ;
                        return bt(l > 1 && vt(u), l > 1 && mt(t.slice(0, l - 1).concat({
                            value: " " === t[l - 2].type ? "*" : ""
                        })).replace(B, "$1"), i, o > l && wt(t.slice(l, o)), s > o && wt(t = t.slice(o)), s > o && mt(t))
                    }
                    u.push(i)
                }
            return vt(u)
        }
        function xt(t, e) {
            var i = e.length > 0
              , o = t.length > 0
              , s = function(s, r, a, l, d) {
                var p, u, f, m = 0, g = "0", v = s && [], y = [], b = c, w = s || o && n.find.TAG("*", d), x = T += null == b ? 1 : Math.random() || .1, k = w.length;
                for (d && (c = r !== h && r); g !== k && null != (p = w[g]); g++) {
                    if (o && p) {
                        for (u = 0; f = t[u++]; )
                            if (f(p, r, a)) {
                                l.push(p);
                                break
                            }
                        d && (T = x)
                    }
                    i && ((p = !f && p) && m--,
                    s && v.push(p))
                }
                if (m += g,
                i && g !== m) {
                    for (u = 0; f = e[u++]; )
                        f(v, y, r, a);
                    if (s) {
                        if (m > 0)
                            for (; g--; )
                                v[g] || y[g] || (y[g] = P.call(l));
                        y = yt(y)
                    }
                    O.apply(l, y),
                    d && !s && y.length > 0 && m + e.length > 1 && ot.uniqueSort(l)
                }
                return d && (T = x,
                c = b),
                v
            };
            return i ? rt(s) : s
        }
        return ft.prototype = n.filters = n.pseudos,
        n.setFilters = new ft,
        r = ot.tokenize = function(t, e) {
            var i, o, s, r, a, l, c, d = S[t + " "];
            if (d)
                return e ? 0 : d.slice(0);
            for (a = t,
            l = [],
            c = n.preFilter; a; ) {
                for (r in (!i || (o = q.exec(a))) && (o && (a = a.slice(o[0].length) || a),
                l.push(s = [])),
                i = !1,
                (o = U.exec(a)) && (i = o.shift(),
                s.push({
                    value: i,
                    type: o[0].replace(B, " ")
                }),
                a = a.slice(i.length)),
                n.filter)
                    !(o = Q[r].exec(a)) || c[r] && !(o = c[r](o)) || (i = o.shift(),
                    s.push({
                        value: i,
                        type: r,
                        matches: o
                    }),
                    a = a.slice(i.length));
                if (!i)
                    break
            }
            return e ? a.length : a ? ot.error(t) : S(t, l).slice(0)
        }
        ,
        a = ot.compile = function(t, e) {
            var i, n = [], o = [], s = $[t + " "];
            if (!s) {
                for (e || (e = r(t)),
                i = e.length; i--; )
                    (s = wt(e[i]))[w] ? n.push(s) : o.push(s);
                (s = $(t, xt(o, n))).selector = t
            }
            return s
        }
        ,
        l = ot.select = function(t, e, o, s) {
            var l, c, d, p, u, h = "function" == typeof t && t, f = !s && r(t = h.selector || t);
            if (o = o || [],
            1 === f.length) {
                if ((c = f[0] = f[0].slice(0)).length > 2 && "ID" === (d = c[0]).type && i.getById && 9 === e.nodeType && m && n.relative[c[1].type]) {
                    if (!(e = (n.find.ID(d.matches[0].replace(it, nt), e) || [])[0]))
                        return o;
                    h && (e = e.parentNode),
                    t = t.slice(c.shift().value.length)
                }
                for (l = Q.needsContext.test(t) ? 0 : c.length; l-- && (d = c[l],
                !n.relative[p = d.type]); )
                    if ((u = n.find[p]) && (s = u(d.matches[0].replace(it, nt), tt.test(c[0].type) && ht(e.parentNode) || e))) {
                        if (c.splice(l, 1),
                        !(t = s.length && mt(c)))
                            return O.apply(o, s),
                            o;
                        break
                    }
            }
            return (h || a(t, f))(s, e, !m, o, tt.test(t) && ht(e.parentNode) || e),
            o
        }
        ,
        i.sortStable = w.split("").sort(E).join("") === w,
        i.detectDuplicates = !!p,
        u(),
        i.sortDetached = at(function(t) {
            return 1 & t.compareDocumentPosition(h.createElement("div"))
        }),
        at(function(t) {
            return t.innerHTML = "<a href='#'></a>",
            "#" === t.firstChild.getAttribute("href")
        }) || lt("type|href|height|width", function(t, e, i) {
            return i ? void 0 : t.getAttribute(e, "type" === e.toLowerCase() ? 1 : 2)
        }),
        i.attributes && at(function(t) {
            return t.innerHTML = "<input/>",
            t.firstChild.setAttribute("value", ""),
            "" === t.firstChild.getAttribute("value")
        }) || lt("value", function(t, e, i) {
            return i || "input" !== t.nodeName.toLowerCase() ? void 0 : t.defaultValue
        }),
        at(function(t) {
            return null == t.getAttribute("disabled")
        }) || lt(H, function(t, e, i) {
            var n;
            return i ? void 0 : !0 === t[e] ? e.toLowerCase() : (n = t.getAttributeNode(e)) && n.specified ? n.value : null
        }),
        ot
    }(t);
    u.find = y,
    u.expr = y.selectors,
    u.expr[":"] = u.expr.pseudos,
    u.unique = y.uniqueSort,
    u.text = y.getText,
    u.isXMLDoc = y.isXML,
    u.contains = y.contains;
    var b = u.expr.match.needsContext
      , w = /^<(\w+)\s*\/?>(?:<\/\1>|)$/
      , x = /^.[^:#\[\.,]*$/;
    function T(t, e, i) {
        if (u.isFunction(e))
            return u.grep(t, function(t, n) {
                return !!e.call(t, n, t) !== i
            });
        if (e.nodeType)
            return u.grep(t, function(t) {
                return t === e !== i
            });
        if ("string" == typeof e) {
            if (x.test(e))
                return u.filter(e, t, i);
            e = u.filter(e, t)
        }
        return u.grep(t, function(t) {
            return u.inArray(t, e) >= 0 !== i
        })
    }
    u.filter = function(t, e, i) {
        var n = e[0];
        return i && (t = ":not(" + t + ")"),
        1 === e.length && 1 === n.nodeType ? u.find.matchesSelector(n, t) ? [n] : [] : u.find.matches(t, u.grep(e, function(t) {
            return 1 === t.nodeType
        }))
    }
    ,
    u.fn.extend({
        find: function(t) {
            var e, i = [], n = this, o = n.length;
            if ("string" != typeof t)
                return this.pushStack(u(t).filter(function() {
                    for (e = 0; o > e; e++)
                        if (u.contains(n[e], this))
                            return !0
                }));
            for (e = 0; o > e; e++)
                u.find(t, n[e], i);
            return (i = this.pushStack(o > 1 ? u.unique(i) : i)).selector = this.selector ? this.selector + " " + t : t,
            i
        },
        filter: function(t) {
            return this.pushStack(T(this, t || [], !1))
        },
        not: function(t) {
            return this.pushStack(T(this, t || [], !0))
        },
        is: function(t) {
            return !!T(this, "string" == typeof t && b.test(t) ? u(t) : t || [], !1).length
        }
    });
    var k, C = t.document, S = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/;
    (u.fn.init = function(t, e) {
        var i, n;
        if (!t)
            return this;
        if ("string" == typeof t) {
            if (!(i = "<" === t.charAt(0) && ">" === t.charAt(t.length - 1) && t.length >= 3 ? [null, t, null] : S.exec(t)) || !i[1] && e)
                return !e || e.jquery ? (e || k).find(t) : this.constructor(e).find(t);
            if (i[1]) {
                if (e = e instanceof u ? e[0] : e,
                u.merge(this, u.parseHTML(i[1], e && e.nodeType ? e.ownerDocument || e : C, !0)),
                w.test(i[1]) && u.isPlainObject(e))
                    for (i in e)
                        u.isFunction(this[i]) ? this[i](e[i]) : this.attr(i, e[i]);
                return this
            }
            if ((n = C.getElementById(i[2])) && n.parentNode) {
                if (n.id !== i[2])
                    return k.find(t);
                this.length = 1,
                this[0] = n
            }
            return this.context = C,
            this.selector = t,
            this
        }
        return t.nodeType ? (this.context = this[0] = t,
        this.length = 1,
        this) : u.isFunction(t) ? void 0 !== k.ready ? k.ready(t) : t(u) : (void 0 !== t.selector && (this.selector = t.selector,
        this.context = t.context),
        u.makeArray(t, this))
    }
    ).prototype = u.fn,
    k = u(C);
    var $ = /^(?:parents|prev(?:Until|All))/
      , E = {
        children: !0,
        contents: !0,
        next: !0,
        prev: !0
    };
    function I(t, e) {
        do {
            t = t[e]
        } while (t && 1 !== t.nodeType);return t
    }
    u.extend({
        dir: function(t, e, i) {
            for (var n = [], o = t[e]; o && 9 !== o.nodeType && (void 0 === i || 1 !== o.nodeType || !u(o).is(i)); )
                1 === o.nodeType && n.push(o),
                o = o[e];
            return n
        },
        sibling: function(t, e) {
            for (var i = []; t; t = t.nextSibling)
                1 === t.nodeType && t !== e && i.push(t);
            return i
        }
    }),
    u.fn.extend({
        has: function(t) {
            var e, i = u(t, this), n = i.length;
            return this.filter(function() {
                for (e = 0; n > e; e++)
                    if (u.contains(this, i[e]))
                        return !0
            })
        },
        closest: function(t, e) {
            for (var i, n = 0, o = this.length, s = [], r = b.test(t) || "string" != typeof t ? u(t, e || this.context) : 0; o > n; n++)
                for (i = this[n]; i && i !== e; i = i.parentNode)
                    if (i.nodeType < 11 && (r ? r.index(i) > -1 : 1 === i.nodeType && u.find.matchesSelector(i, t))) {
                        s.push(i);
                        break
                    }
            return this.pushStack(s.length > 1 ? u.unique(s) : s)
        },
        index: function(t) {
            return t ? "string" == typeof t ? u.inArray(this[0], u(t)) : u.inArray(t.jquery ? t[0] : t, this) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        },
        add: function(t, e) {
            return this.pushStack(u.unique(u.merge(this.get(), u(t, e))))
        },
        addBack: function(t) {
            return this.add(null == t ? this.prevObject : this.prevObject.filter(t))
        }
    }),
    u.each({
        parent: function(t) {
            var e = t.parentNode;
            return e && 11 !== e.nodeType ? e : null
        },
        parents: function(t) {
            return u.dir(t, "parentNode")
        },
        parentsUntil: function(t, e, i) {
            return u.dir(t, "parentNode", i)
        },
        next: function(t) {
            return I(t, "nextSibling")
        },
        prev: function(t) {
            return I(t, "previousSibling")
        },
        nextAll: function(t) {
            return u.dir(t, "nextSibling")
        },
        prevAll: function(t) {
            return u.dir(t, "previousSibling")
        },
        nextUntil: function(t, e, i) {
            return u.dir(t, "nextSibling", i)
        },
        prevUntil: function(t, e, i) {
            return u.dir(t, "previousSibling", i)
        },
        siblings: function(t) {
            return u.sibling((t.parentNode || {}).firstChild, t)
        },
        children: function(t) {
            return u.sibling(t.firstChild)
        },
        contents: function(t) {
            return u.nodeName(t, "iframe") ? t.contentDocument || t.contentWindow.document : u.merge([], t.childNodes)
        }
    }, function(t, e) {
        u.fn[t] = function(i, n) {
            var o = u.map(this, e, i);
            return "Until" !== t.slice(-5) && (n = i),
            n && "string" == typeof n && (o = u.filter(n, o)),
            this.length > 1 && (E[t] || (o = u.unique(o)),
            $.test(t) && (o = o.reverse())),
            this.pushStack(o)
        }
    });
    var A, _ = /\S+/g, N = {};
    function P() {
        C.addEventListener ? (C.removeEventListener("DOMContentLoaded", D, !1),
        t.removeEventListener("load", D, !1)) : (C.detachEvent("onreadystatechange", D),
        t.detachEvent("onload", D))
    }
    function D() {
        (C.addEventListener || "load" === event.type || "complete" === C.readyState) && (P(),
        u.ready())
    }
    u.Callbacks = function(t) {
        t = "string" == typeof t ? N[t] || function(t) {
            var e = N[t] = {};
            return u.each(t.match(_) || [], function(t, i) {
                e[i] = !0
            }),
            e
        }(t) : u.extend({}, t);
        var e, i, n, o, s, r, a = [], l = !t.once && [], c = function(p) {
            for (i = t.memory && p,
            n = !0,
            s = r || 0,
            r = 0,
            o = a.length,
            e = !0; a && o > s; s++)
                if (!1 === a[s].apply(p[0], p[1]) && t.stopOnFalse) {
                    i = !1;
                    break
                }
            e = !1,
            a && (l ? l.length && c(l.shift()) : i ? a = [] : d.disable())
        }, d = {
            add: function() {
                if (a) {
                    var n = a.length;
                    !function e(i) {
                        u.each(i, function(i, n) {
                            var o = u.type(n);
                            "function" === o ? t.unique && d.has(n) || a.push(n) : n && n.length && "string" !== o && e(n)
                        })
                    }(arguments),
                    e ? o = a.length : i && (r = n,
                    c(i))
                }
                return this
            },
            remove: function() {
                return a && u.each(arguments, function(t, i) {
                    for (var n; (n = u.inArray(i, a, n)) > -1; )
                        a.splice(n, 1),
                        e && (o >= n && o--,
                        s >= n && s--)
                }),
                this
            },
            has: function(t) {
                return t ? u.inArray(t, a) > -1 : !(!a || !a.length)
            },
            empty: function() {
                return a = [],
                o = 0,
                this
            },
            disable: function() {
                return a = l = i = void 0,
                this
            },
            disabled: function() {
                return !a
            },
            lock: function() {
                return l = void 0,
                i || d.disable(),
                this
            },
            locked: function() {
                return !l
            },
            fireWith: function(t, i) {
                return !a || n && !l || (i = [t, (i = i || []).slice ? i.slice() : i],
                e ? l.push(i) : c(i)),
                this
            },
            fire: function() {
                return d.fireWith(this, arguments),
                this
            },
            fired: function() {
                return !!n
            }
        };
        return d
    }
    ,
    u.extend({
        Deferred: function(t) {
            var e = [["resolve", "done", u.Callbacks("once memory"), "resolved"], ["reject", "fail", u.Callbacks("once memory"), "rejected"], ["notify", "progress", u.Callbacks("memory")]]
              , i = "pending"
              , n = {
                state: function() {
                    return i
                },
                always: function() {
                    return o.done(arguments).fail(arguments),
                    this
                },
                then: function() {
                    var t = arguments;
                    return u.Deferred(function(i) {
                        u.each(e, function(e, s) {
                            var r = u.isFunction(t[e]) && t[e];
                            o[s[1]](function() {
                                var t = r && r.apply(this, arguments);
                                t && u.isFunction(t.promise) ? t.promise().done(i.resolve).fail(i.reject).progress(i.notify) : i[s[0] + "With"](this === n ? i.promise() : this, r ? [t] : arguments)
                            })
                        }),
                        t = null
                    }).promise()
                },
                promise: function(t) {
                    return null != t ? u.extend(t, n) : n
                }
            }
              , o = {};
            return n.pipe = n.then,
            u.each(e, function(t, s) {
                var r = s[2]
                  , a = s[3];
                n[s[1]] = r.add,
                a && r.add(function() {
                    i = a
                }, e[1 ^ t][2].disable, e[2][2].lock),
                o[s[0]] = function() {
                    return o[s[0] + "With"](this === o ? n : this, arguments),
                    this
                }
                ,
                o[s[0] + "With"] = r.fireWith
            }),
            n.promise(o),
            t && t.call(o, o),
            o
        },
        when: function(t) {
            var e, i, o, s = 0, r = n.call(arguments), a = r.length, l = 1 !== a || t && u.isFunction(t.promise) ? a : 0, c = 1 === l ? t : u.Deferred(), d = function(t, i, o) {
                return function(s) {
                    i[t] = this,
                    o[t] = arguments.length > 1 ? n.call(arguments) : s,
                    o === e ? c.notifyWith(i, o) : --l || c.resolveWith(i, o)
                }
            };
            if (a > 1)
                for (e = new Array(a),
                i = new Array(a),
                o = new Array(a); a > s; s++)
                    r[s] && u.isFunction(r[s].promise) ? r[s].promise().done(d(s, o, r)).fail(c.reject).progress(d(s, i, e)) : --l;
            return l || c.resolveWith(o, r),
            c.promise()
        }
    }),
    u.fn.ready = function(t) {
        return u.ready.promise().done(t),
        this
    }
    ,
    u.extend({
        isReady: !1,
        readyWait: 1,
        holdReady: function(t) {
            t ? u.readyWait++ : u.ready(!0)
        },
        ready: function(t) {
            if (!0 === t ? !--u.readyWait : !u.isReady) {
                if (!C.body)
                    return setTimeout(u.ready);
                u.isReady = !0,
                !0 !== t && --u.readyWait > 0 || (A.resolveWith(C, [u]),
                u.fn.triggerHandler && (u(C).triggerHandler("ready"),
                u(C).off("ready")))
            }
        }
    }),
    u.ready.promise = function(e) {
        if (!A)
            if (A = u.Deferred(),
            "complete" === C.readyState)
                setTimeout(u.ready);
            else if (C.addEventListener)
                C.addEventListener("DOMContentLoaded", D, !1),
                t.addEventListener("load", D, !1);
            else {
                C.attachEvent("onreadystatechange", D),
                t.attachEvent("onload", D);
                var i = !1;
                try {
                    i = null == t.frameElement && C.documentElement
                } catch (t) {}
                i && i.doScroll && function t() {
                    if (!u.isReady) {
                        try {
                            i.doScroll("left")
                        } catch (e) {
                            return setTimeout(t, 50)
                        }
                        P(),
                        u.ready()
                    }
                }()
            }
        return A.promise(e)
    }
    ;
    var O, j = "undefined";
    for (O in u(d))
        break;
    d.ownLast = "0" !== O,
    d.inlineBlockNeedsLayout = !1,
    u(function() {
        var t, e, i, n;
        (i = C.getElementsByTagName("body")[0]) && i.style && (e = C.createElement("div"),
        (n = C.createElement("div")).style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px",
        i.appendChild(n).appendChild(e),
        typeof e.style.zoom !== j && (e.style.cssText = "display:inline;margin:0;border:0;padding:1px;width:1px;zoom:1",
        d.inlineBlockNeedsLayout = t = 3 === e.offsetWidth,
        t && (i.style.zoom = 1)),
        i.removeChild(n))
    }),
    function() {
        var t = C.createElement("div");
        if (null == d.deleteExpando) {
            d.deleteExpando = !0;
            try {
                delete t.test
            } catch (t) {
                d.deleteExpando = !1
            }
        }
        t = null
    }(),
    u.acceptData = function(t) {
        var e = u.noData[(t.nodeName + " ").toLowerCase()]
          , i = +t.nodeType || 1;
        return (1 === i || 9 === i) && (!e || !0 !== e && t.getAttribute("classid") === e)
    }
    ;
    var L = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/
      , H = /([A-Z])/g;
    function M(t, e, i) {
        if (void 0 === i && 1 === t.nodeType) {
            var n = "data-" + e.replace(H, "-$1").toLowerCase();
            if ("string" == typeof (i = t.getAttribute(n))) {
                try {
                    i = "true" === i || "false" !== i && ("null" === i ? null : +i + "" === i ? +i : L.test(i) ? u.parseJSON(i) : i)
                } catch (t) {}
                u.data(t, e, i)
            } else
                i = void 0
        }
        return i
    }
    function z(t) {
        var e;
        for (e in t)
            if (("data" !== e || !u.isEmptyObject(t[e])) && "toJSON" !== e)
                return !1;
        return !0
    }
    function W(t, e, n, o) {
        if (u.acceptData(t)) {
            var s, r, a = u.expando, l = t.nodeType, c = l ? u.cache : t, d = l ? t[a] : t[a] && a;
            if (d && c[d] && (o || c[d].data) || void 0 !== n || "string" != typeof e)
                return d || (d = l ? t[a] = i.pop() || u.guid++ : a),
                c[d] || (c[d] = l ? {} : {
                    toJSON: u.noop
                }),
                ("object" == typeof e || "function" == typeof e) && (o ? c[d] = u.extend(c[d], e) : c[d].data = u.extend(c[d].data, e)),
                r = c[d],
                o || (r.data || (r.data = {}),
                r = r.data),
                void 0 !== n && (r[u.camelCase(e)] = n),
                "string" == typeof e ? null == (s = r[e]) && (s = r[u.camelCase(e)]) : s = r,
                s
        }
    }
    function R(t, e, i) {
        if (u.acceptData(t)) {
            var n, o, s = t.nodeType, r = s ? u.cache : t, a = s ? t[u.expando] : u.expando;
            if (r[a]) {
                if (e && (n = i ? r[a] : r[a].data)) {
                    u.isArray(e) ? e = e.concat(u.map(e, u.camelCase)) : e in n ? e = [e] : e = (e = u.camelCase(e))in n ? [e] : e.split(" "),
                    o = e.length;
                    for (; o--; )
                        delete n[e[o]];
                    if (i ? !z(n) : !u.isEmptyObject(n))
                        return
                }
                (i || (delete r[a].data,
                z(r[a]))) && (s ? u.cleanData([t], !0) : d.deleteExpando || r != r.window ? delete r[a] : r[a] = null)
            }
        }
    }
    u.extend({
        cache: {},
        noData: {
            "applet ": !0,
            "embed ": !0,
            "object ": "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
        },
        hasData: function(t) {
            return !!(t = t.nodeType ? u.cache[t[u.expando]] : t[u.expando]) && !z(t)
        },
        data: function(t, e, i) {
            return W(t, e, i)
        },
        removeData: function(t, e) {
            return R(t, e)
        },
        _data: function(t, e, i) {
            return W(t, e, i, !0)
        },
        _removeData: function(t, e) {
            return R(t, e, !0)
        }
    }),
    u.fn.extend({
        data: function(t, e) {
            var i, n, o, s = this[0], r = s && s.attributes;
            if (void 0 === t) {
                if (this.length && (o = u.data(s),
                1 === s.nodeType && !u._data(s, "parsedAttrs"))) {
                    for (i = r.length; i--; )
                        r[i] && (0 === (n = r[i].name).indexOf("data-") && M(s, n = u.camelCase(n.slice(5)), o[n]));
                    u._data(s, "parsedAttrs", !0)
                }
                return o
            }
            return "object" == typeof t ? this.each(function() {
                u.data(this, t)
            }) : arguments.length > 1 ? this.each(function() {
                u.data(this, t, e)
            }) : s ? M(s, t, u.data(s, t)) : void 0
        },
        removeData: function(t) {
            return this.each(function() {
                u.removeData(this, t)
            })
        }
    }),
    u.extend({
        queue: function(t, e, i) {
            var n;
            return t ? (e = (e || "fx") + "queue",
            n = u._data(t, e),
            i && (!n || u.isArray(i) ? n = u._data(t, e, u.makeArray(i)) : n.push(i)),
            n || []) : void 0
        },
        dequeue: function(t, e) {
            e = e || "fx";
            var i = u.queue(t, e)
              , n = i.length
              , o = i.shift()
              , s = u._queueHooks(t, e);
            "inprogress" === o && (o = i.shift(),
            n--),
            o && ("fx" === e && i.unshift("inprogress"),
            delete s.stop,
            o.call(t, function() {
                u.dequeue(t, e)
            }, s)),
            !n && s && s.empty.fire()
        },
        _queueHooks: function(t, e) {
            var i = e + "queueHooks";
            return u._data(t, i) || u._data(t, i, {
                empty: u.Callbacks("once memory").add(function() {
                    u._removeData(t, e + "queue"),
                    u._removeData(t, i)
                })
            })
        }
    }),
    u.fn.extend({
        queue: function(t, e) {
            var i = 2;
            return "string" != typeof t && (e = t,
            t = "fx",
            i--),
            arguments.length < i ? u.queue(this[0], t) : void 0 === e ? this : this.each(function() {
                var i = u.queue(this, t, e);
                u._queueHooks(this, t),
                "fx" === t && "inprogress" !== i[0] && u.dequeue(this, t)
            })
        },
        dequeue: function(t) {
            return this.each(function() {
                u.dequeue(this, t)
            })
        },
        clearQueue: function(t) {
            return this.queue(t || "fx", [])
        },
        promise: function(t, e) {
            var i, n = 1, o = u.Deferred(), s = this, r = this.length, a = function() {
                --n || o.resolveWith(s, [s])
            };
            for ("string" != typeof t && (e = t,
            t = void 0),
            t = t || "fx"; r--; )
                (i = u._data(s[r], t + "queueHooks")) && i.empty && (n++,
                i.empty.add(a));
            return a(),
            o.promise(e)
        }
    });
    var F = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source
      , B = ["Top", "Right", "Bottom", "Left"]
      , q = function(t, e) {
        return t = e || t,
        "none" === u.css(t, "display") || !u.contains(t.ownerDocument, t)
    }
      , U = u.access = function(t, e, i, n, o, s, r) {
        var a = 0
          , l = t.length
          , c = null == i;
        if ("object" === u.type(i))
            for (a in o = !0,
            i)
                u.access(t, e, a, i[a], !0, s, r);
        else if (void 0 !== n && (o = !0,
        u.isFunction(n) || (r = !0),
        c && (r ? (e.call(t, n),
        e = null) : (c = e,
        e = function(t, e, i) {
            return c.call(u(t), i)
        }
        )),
        e))
            for (; l > a; a++)
                e(t[a], i, r ? n : n.call(t[a], a, e(t[a], i)));
        return o ? t : c ? e.call(t) : l ? e(t[0], i) : s
    }
      , X = /^(?:checkbox|radio)$/i;
    !function() {
        var t = C.createElement("input")
          , e = C.createElement("div")
          , i = C.createDocumentFragment();
        if (e.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",
        d.leadingWhitespace = 3 === e.firstChild.nodeType,
        d.tbody = !e.getElementsByTagName("tbody").length,
        d.htmlSerialize = !!e.getElementsByTagName("link").length,
        d.html5Clone = "<:nav></:nav>" !== C.createElement("nav").cloneNode(!0).outerHTML,
        t.type = "checkbox",
        t.checked = !0,
        i.appendChild(t),
        d.appendChecked = t.checked,
        e.innerHTML = "<textarea>x</textarea>",
        d.noCloneChecked = !!e.cloneNode(!0).lastChild.defaultValue,
        i.appendChild(e),
        e.innerHTML = "<input type='radio' checked='checked' name='t'/>",
        d.checkClone = e.cloneNode(!0).cloneNode(!0).lastChild.checked,
        d.noCloneEvent = !0,
        e.attachEvent && (e.attachEvent("onclick", function() {
            d.noCloneEvent = !1
        }),
        e.cloneNode(!0).click()),
        null == d.deleteExpando) {
            d.deleteExpando = !0;
            try {
                delete e.test
            } catch (t) {
                d.deleteExpando = !1
            }
        }
    }(),
    function() {
        var e, i, n = C.createElement("div");
        for (e in {
            submit: !0,
            change: !0,
            focusin: !0
        })
            i = "on" + e,
            (d[e + "Bubbles"] = i in t) || (n.setAttribute(i, "t"),
            d[e + "Bubbles"] = !1 === n.attributes[i].expando);
        n = null
    }();
    var V = /^(?:input|select|textarea)$/i
      , Y = /^key/
      , Q = /^(?:mouse|pointer|contextmenu)|click/
      , K = /^(?:focusinfocus|focusoutblur)$/
      , Z = /^([^.]*)(?:\.(.+)|)$/;
    function G() {
        return !0
    }
    function J() {
        return !1
    }
    function tt() {
        try {
            return C.activeElement
        } catch (t) {}
    }
    function et(t) {
        var e = it.split("|")
          , i = t.createDocumentFragment();
        if (i.createElement)
            for (; e.length; )
                i.createElement(e.pop());
        return i
    }
    u.event = {
        global: {},
        add: function(t, e, i, n, o) {
            var s, r, a, l, c, d, p, h, f, m, g, v = u._data(t);
            if (v) {
                for (i.handler && (i = (l = i).handler,
                o = l.selector),
                i.guid || (i.guid = u.guid++),
                (r = v.events) || (r = v.events = {}),
                (d = v.handle) || ((d = v.handle = function(t) {
                    return typeof u === j || t && u.event.triggered === t.type ? void 0 : u.event.dispatch.apply(d.elem, arguments)
                }
                ).elem = t),
                a = (e = (e || "").match(_) || [""]).length; a--; )
                    f = g = (s = Z.exec(e[a]) || [])[1],
                    m = (s[2] || "").split(".").sort(),
                    f && (c = u.event.special[f] || {},
                    f = (o ? c.delegateType : c.bindType) || f,
                    c = u.event.special[f] || {},
                    p = u.extend({
                        type: f,
                        origType: g,
                        data: n,
                        handler: i,
                        guid: i.guid,
                        selector: o,
                        needsContext: o && u.expr.match.needsContext.test(o),
                        namespace: m.join(".")
                    }, l),
                    (h = r[f]) || ((h = r[f] = []).delegateCount = 0,
                    c.setup && !1 !== c.setup.call(t, n, m, d) || (t.addEventListener ? t.addEventListener(f, d, !1) : t.attachEvent && t.attachEvent("on" + f, d))),
                    c.add && (c.add.call(t, p),
                    p.handler.guid || (p.handler.guid = i.guid)),
                    o ? h.splice(h.delegateCount++, 0, p) : h.push(p),
                    u.event.global[f] = !0);
                t = null
            }
        },
        remove: function(t, e, i, n, o) {
            var s, r, a, l, c, d, p, h, f, m, g, v = u.hasData(t) && u._data(t);
            if (v && (d = v.events)) {
                for (c = (e = (e || "").match(_) || [""]).length; c--; )
                    if (f = g = (a = Z.exec(e[c]) || [])[1],
                    m = (a[2] || "").split(".").sort(),
                    f) {
                        for (p = u.event.special[f] || {},
                        h = d[f = (n ? p.delegateType : p.bindType) || f] || [],
                        a = a[2] && new RegExp("(^|\\.)" + m.join("\\.(?:.*\\.|)") + "(\\.|$)"),
                        l = s = h.length; s--; )
                            r = h[s],
                            !o && g !== r.origType || i && i.guid !== r.guid || a && !a.test(r.namespace) || n && n !== r.selector && ("**" !== n || !r.selector) || (h.splice(s, 1),
                            r.selector && h.delegateCount--,
                            p.remove && p.remove.call(t, r));
                        l && !h.length && (p.teardown && !1 !== p.teardown.call(t, m, v.handle) || u.removeEvent(t, f, v.handle),
                        delete d[f])
                    } else
                        for (f in d)
                            u.event.remove(t, f + e[c], i, n, !0);
                u.isEmptyObject(d) && (delete v.handle,
                u._removeData(t, "events"))
            }
        },
        trigger: function(e, i, n, o) {
            var s, r, a, l, d, p, h, f = [n || C], m = c.call(e, "type") ? e.type : e, g = c.call(e, "namespace") ? e.namespace.split(".") : [];
            if (a = p = n = n || C,
            3 !== n.nodeType && 8 !== n.nodeType && !K.test(m + u.event.triggered) && (m.indexOf(".") >= 0 && (g = m.split("."),
            m = g.shift(),
            g.sort()),
            r = m.indexOf(":") < 0 && "on" + m,
            (e = e[u.expando] ? e : new u.Event(m,"object" == typeof e && e)).isTrigger = o ? 2 : 3,
            e.namespace = g.join("."),
            e.namespace_re = e.namespace ? new RegExp("(^|\\.)" + g.join("\\.(?:.*\\.|)") + "(\\.|$)") : null,
            e.result = void 0,
            e.target || (e.target = n),
            i = null == i ? [e] : u.makeArray(i, [e]),
            d = u.event.special[m] || {},
            o || !d.trigger || !1 !== d.trigger.apply(n, i))) {
                if (!o && !d.noBubble && !u.isWindow(n)) {
                    for (l = d.delegateType || m,
                    K.test(l + m) || (a = a.parentNode); a; a = a.parentNode)
                        f.push(a),
                        p = a;
                    p === (n.ownerDocument || C) && f.push(p.defaultView || p.parentWindow || t)
                }
                for (h = 0; (a = f[h++]) && !e.isPropagationStopped(); )
                    e.type = h > 1 ? l : d.bindType || m,
                    (s = (u._data(a, "events") || {})[e.type] && u._data(a, "handle")) && s.apply(a, i),
                    (s = r && a[r]) && s.apply && u.acceptData(a) && (e.result = s.apply(a, i),
                    !1 === e.result && e.preventDefault());
                if (e.type = m,
                !o && !e.isDefaultPrevented() && (!d._default || !1 === d._default.apply(f.pop(), i)) && u.acceptData(n) && r && n[m] && !u.isWindow(n)) {
                    (p = n[r]) && (n[r] = null),
                    u.event.triggered = m;
                    try {
                        n[m]()
                    } catch (t) {}
                    u.event.triggered = void 0,
                    p && (n[r] = p)
                }
                return e.result
            }
        },
        dispatch: function(t) {
            t = u.event.fix(t);
            var e, i, o, s, r, a = [], l = n.call(arguments), c = (u._data(this, "events") || {})[t.type] || [], d = u.event.special[t.type] || {};
            if (l[0] = t,
            t.delegateTarget = this,
            !d.preDispatch || !1 !== d.preDispatch.call(this, t)) {
                for (a = u.event.handlers.call(this, t, c),
                e = 0; (s = a[e++]) && !t.isPropagationStopped(); )
                    for (t.currentTarget = s.elem,
                    r = 0; (o = s.handlers[r++]) && !t.isImmediatePropagationStopped(); )
                        (!t.namespace_re || t.namespace_re.test(o.namespace)) && (t.handleObj = o,
                        t.data = o.data,
                        void 0 !== (i = ((u.event.special[o.origType] || {}).handle || o.handler).apply(s.elem, l)) && !1 === (t.result = i) && (t.preventDefault(),
                        t.stopPropagation()));
                return d.postDispatch && d.postDispatch.call(this, t),
                t.result
            }
        },
        handlers: function(t, e) {
            var i, n, o, s, r = [], a = e.delegateCount, l = t.target;
            if (a && l.nodeType && (!t.button || "click" !== t.type))
                for (; l != this; l = l.parentNode || this)
                    if (1 === l.nodeType && (!0 !== l.disabled || "click" !== t.type)) {
                        for (o = [],
                        s = 0; a > s; s++)
                            void 0 === o[i = (n = e[s]).selector + " "] && (o[i] = n.needsContext ? u(i, this).index(l) >= 0 : u.find(i, this, null, [l]).length),
                            o[i] && o.push(n);
                        o.length && r.push({
                            elem: l,
                            handlers: o
                        })
                    }
            return a < e.length && r.push({
                elem: this,
                handlers: e.slice(a)
            }),
            r
        },
        fix: function(t) {
            if (t[u.expando])
                return t;
            var e, i, n, o = t.type, s = t, r = this.fixHooks[o];
            for (r || (this.fixHooks[o] = r = Q.test(o) ? this.mouseHooks : Y.test(o) ? this.keyHooks : {}),
            n = r.props ? this.props.concat(r.props) : this.props,
            t = new u.Event(s),
            e = n.length; e--; )
                t[i = n[e]] = s[i];
            return t.target || (t.target = s.srcElement || C),
            3 === t.target.nodeType && (t.target = t.target.parentNode),
            t.metaKey = !!t.metaKey,
            r.filter ? r.filter(t, s) : t
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "),
            filter: function(t, e) {
                return null == t.which && (t.which = null != e.charCode ? e.charCode : e.keyCode),
                t
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
            filter: function(t, e) {
                var i, n, o, s = e.button, r = e.fromElement;
                return null == t.pageX && null != e.clientX && (o = (n = t.target.ownerDocument || C).documentElement,
                i = n.body,
                t.pageX = e.clientX + (o && o.scrollLeft || i && i.scrollLeft || 0) - (o && o.clientLeft || i && i.clientLeft || 0),
                t.pageY = e.clientY + (o && o.scrollTop || i && i.scrollTop || 0) - (o && o.clientTop || i && i.clientTop || 0)),
                !t.relatedTarget && r && (t.relatedTarget = r === t.target ? e.toElement : r),
                t.which || void 0 === s || (t.which = 1 & s ? 1 : 2 & s ? 3 : 4 & s ? 2 : 0),
                t
            }
        },
        special: {
            load: {
                noBubble: !0
            },
            focus: {
                trigger: function() {
                    if (this !== tt() && this.focus)
                        try {
                            return this.focus(),
                            !1
                        } catch (t) {}
                },
                delegateType: "focusin"
            },
            blur: {
                trigger: function() {
                    return this === tt() && this.blur ? (this.blur(),
                    !1) : void 0
                },
                delegateType: "focusout"
            },
            click: {
                trigger: function() {
                    return u.nodeName(this, "input") && "checkbox" === this.type && this.click ? (this.click(),
                    !1) : void 0
                },
                _default: function(t) {
                    return u.nodeName(t.target, "a")
                }
            },
            beforeunload: {
                postDispatch: function(t) {
                    void 0 !== t.result && t.originalEvent && (t.originalEvent.returnValue = t.result)
                }
            }
        },
        simulate: function(t, e, i, n) {
            var o = u.extend(new u.Event, i, {
                type: t,
                isSimulated: !0,
                originalEvent: {}
            });
            n ? u.event.trigger(o, null, e) : u.event.dispatch.call(e, o),
            o.isDefaultPrevented() && i.preventDefault()
        }
    },
    u.removeEvent = C.removeEventListener ? function(t, e, i) {
        t.removeEventListener && t.removeEventListener(e, i, !1)
    }
    : function(t, e, i) {
        var n = "on" + e;
        t.detachEvent && (typeof t[n] === j && (t[n] = null),
        t.detachEvent(n, i))
    }
    ,
    u.Event = function(t, e) {
        return this instanceof u.Event ? (t && t.type ? (this.originalEvent = t,
        this.type = t.type,
        this.isDefaultPrevented = t.defaultPrevented || void 0 === t.defaultPrevented && !1 === t.returnValue ? G : J) : this.type = t,
        e && u.extend(this, e),
        this.timeStamp = t && t.timeStamp || u.now(),
        void (this[u.expando] = !0)) : new u.Event(t,e)
    }
    ,
    u.Event.prototype = {
        isDefaultPrevented: J,
        isPropagationStopped: J,
        isImmediatePropagationStopped: J,
        preventDefault: function() {
            var t = this.originalEvent;
            this.isDefaultPrevented = G,
            t && (t.preventDefault ? t.preventDefault() : t.returnValue = !1)
        },
        stopPropagation: function() {
            var t = this.originalEvent;
            this.isPropagationStopped = G,
            t && (t.stopPropagation && t.stopPropagation(),
            t.cancelBubble = !0)
        },
        stopImmediatePropagation: function() {
            var t = this.originalEvent;
            this.isImmediatePropagationStopped = G,
            t && t.stopImmediatePropagation && t.stopImmediatePropagation(),
            this.stopPropagation()
        }
    },
    u.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout",
        pointerenter: "pointerover",
        pointerleave: "pointerout"
    }, function(t, e) {
        u.event.special[t] = {
            delegateType: e,
            bindType: e,
            handle: function(t) {
                var i, n = t.relatedTarget, o = t.handleObj;
                return (!n || n !== this && !u.contains(this, n)) && (t.type = o.origType,
                i = o.handler.apply(this, arguments),
                t.type = e),
                i
            }
        }
    }),
    d.submitBubbles || (u.event.special.submit = {
        setup: function() {
            return !u.nodeName(this, "form") && void u.event.add(this, "click._submit keypress._submit", function(t) {
                var e = t.target
                  , i = u.nodeName(e, "input") || u.nodeName(e, "button") ? e.form : void 0;
                i && !u._data(i, "submitBubbles") && (u.event.add(i, "submit._submit", function(t) {
                    t._submit_bubble = !0
                }),
                u._data(i, "submitBubbles", !0))
            })
        },
        postDispatch: function(t) {
            t._submit_bubble && (delete t._submit_bubble,
            this.parentNode && !t.isTrigger && u.event.simulate("submit", this.parentNode, t, !0))
        },
        teardown: function() {
            return !u.nodeName(this, "form") && void u.event.remove(this, "._submit")
        }
    }),
    d.changeBubbles || (u.event.special.change = {
        setup: function() {
            return V.test(this.nodeName) ? (("checkbox" === this.type || "radio" === this.type) && (u.event.add(this, "propertychange._change", function(t) {
                "checked" === t.originalEvent.propertyName && (this._just_changed = !0)
            }),
            u.event.add(this, "click._change", function(t) {
                this._just_changed && !t.isTrigger && (this._just_changed = !1),
                u.event.simulate("change", this, t, !0)
            })),
            !1) : void u.event.add(this, "beforeactivate._change", function(t) {
                var e = t.target;
                V.test(e.nodeName) && !u._data(e, "changeBubbles") && (u.event.add(e, "change._change", function(t) {
                    !this.parentNode || t.isSimulated || t.isTrigger || u.event.simulate("change", this.parentNode, t, !0)
                }),
                u._data(e, "changeBubbles", !0))
            })
        },
        handle: function(t) {
            var e = t.target;
            return this !== e || t.isSimulated || t.isTrigger || "radio" !== e.type && "checkbox" !== e.type ? t.handleObj.handler.apply(this, arguments) : void 0
        },
        teardown: function() {
            return u.event.remove(this, "._change"),
            !V.test(this.nodeName)
        }
    }),
    d.focusinBubbles || u.each({
        focus: "focusin",
        blur: "focusout"
    }, function(t, e) {
        var i = function(t) {
            u.event.simulate(e, t.target, u.event.fix(t), !0)
        };
        u.event.special[e] = {
            setup: function() {
                var n = this.ownerDocument || this
                  , o = u._data(n, e);
                o || n.addEventListener(t, i, !0),
                u._data(n, e, (o || 0) + 1)
            },
            teardown: function() {
                var n = this.ownerDocument || this
                  , o = u._data(n, e) - 1;
                o ? u._data(n, e, o) : (n.removeEventListener(t, i, !0),
                u._removeData(n, e))
            }
        }
    }),
    u.fn.extend({
        on: function(t, e, i, n, o) {
            var s, r;
            if ("object" == typeof t) {
                for (s in "string" != typeof e && (i = i || e,
                e = void 0),
                t)
                    this.on(s, e, i, t[s], o);
                return this
            }
            if (null == i && null == n ? (n = e,
            i = e = void 0) : null == n && ("string" == typeof e ? (n = i,
            i = void 0) : (n = i,
            i = e,
            e = void 0)),
            !1 === n)
                n = J;
            else if (!n)
                return this;
            return 1 === o && (r = n,
            (n = function(t) {
                return u().off(t),
                r.apply(this, arguments)
            }
            ).guid = r.guid || (r.guid = u.guid++)),
            this.each(function() {
                u.event.add(this, t, n, i, e)
            })
        },
        one: function(t, e, i, n) {
            return this.on(t, e, i, n, 1)
        },
        off: function(t, e, i) {
            var n, o;
            if (t && t.preventDefault && t.handleObj)
                return n = t.handleObj,
                u(t.delegateTarget).off(n.namespace ? n.origType + "." + n.namespace : n.origType, n.selector, n.handler),
                this;
            if ("object" == typeof t) {
                for (o in t)
                    this.off(o, e, t[o]);
                return this
            }
            return (!1 === e || "function" == typeof e) && (i = e,
            e = void 0),
            !1 === i && (i = J),
            this.each(function() {
                u.event.remove(this, t, i, e)
            })
        },
        trigger: function(t, e) {
            return this.each(function() {
                u.event.trigger(t, e, this)
            })
        },
        triggerHandler: function(t, e) {
            var i = this[0];
            return i ? u.event.trigger(t, e, i, !0) : void 0
        }
    });
    var it = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video"
      , nt = / jQuery\d+="(?:null|\d+)"/g
      , ot = new RegExp("<(?:" + it + ")[\\s/>]","i")
      , st = /^\s+/
      , rt = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi
      , at = /<([\w:]+)/
      , lt = /<tbody/i
      , ct = /<|&#?\w+;/
      , dt = /<(?:script|style|link)/i
      , pt = /checked\s*(?:[^=]|=\s*.checked.)/i
      , ut = /^$|\/(?:java|ecma)script/i
      , ht = /^true\/(.*)/
      , ft = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g
      , mt = {
        option: [1, "<select multiple='multiple'>", "</select>"],
        legend: [1, "<fieldset>", "</fieldset>"],
        area: [1, "<map>", "</map>"],
        param: [1, "<object>", "</object>"],
        thead: [1, "<table>", "</table>"],
        tr: [2, "<table><tbody>", "</tbody></table>"],
        col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
        td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
        _default: d.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"]
    }
      , gt = et(C).appendChild(C.createElement("div"));
    function vt(t, e) {
        var i, n, o = 0, s = typeof t.getElementsByTagName !== j ? t.getElementsByTagName(e || "*") : typeof t.querySelectorAll !== j ? t.querySelectorAll(e || "*") : void 0;
        if (!s)
            for (s = [],
            i = t.childNodes || t; null != (n = i[o]); o++)
                !e || u.nodeName(n, e) ? s.push(n) : u.merge(s, vt(n, e));
        return void 0 === e || e && u.nodeName(t, e) ? u.merge([t], s) : s
    }
    function yt(t) {
        X.test(t.type) && (t.defaultChecked = t.checked)
    }
    function bt(t, e) {
        return u.nodeName(t, "table") && u.nodeName(11 !== e.nodeType ? e : e.firstChild, "tr") ? t.getElementsByTagName("tbody")[0] || t.appendChild(t.ownerDocument.createElement("tbody")) : t
    }
    function wt(t) {
        return t.type = (null !== u.find.attr(t, "type")) + "/" + t.type,
        t
    }
    function xt(t) {
        var e = ht.exec(t.type);
        return e ? t.type = e[1] : t.removeAttribute("type"),
        t
    }
    function Tt(t, e) {
        for (var i, n = 0; null != (i = t[n]); n++)
            u._data(i, "globalEval", !e || u._data(e[n], "globalEval"))
    }
    function kt(t, e) {
        if (1 === e.nodeType && u.hasData(t)) {
            var i, n, o, s = u._data(t), r = u._data(e, s), a = s.events;
            if (a)
                for (i in delete r.handle,
                r.events = {},
                a)
                    for (n = 0,
                    o = a[i].length; o > n; n++)
                        u.event.add(e, i, a[i][n]);
            r.data && (r.data = u.extend({}, r.data))
        }
    }
    function Ct(t, e) {
        var i, n, o;
        if (1 === e.nodeType) {
            if (i = e.nodeName.toLowerCase(),
            !d.noCloneEvent && e[u.expando]) {
                for (n in (o = u._data(e)).events)
                    u.removeEvent(e, n, o.handle);
                e.removeAttribute(u.expando)
            }
            "script" === i && e.text !== t.text ? (wt(e).text = t.text,
            xt(e)) : "object" === i ? (e.parentNode && (e.outerHTML = t.outerHTML),
            d.html5Clone && t.innerHTML && !u.trim(e.innerHTML) && (e.innerHTML = t.innerHTML)) : "input" === i && X.test(t.type) ? (e.defaultChecked = e.checked = t.checked,
            e.value !== t.value && (e.value = t.value)) : "option" === i ? e.defaultSelected = e.selected = t.defaultSelected : ("input" === i || "textarea" === i) && (e.defaultValue = t.defaultValue)
        }
    }
    mt.optgroup = mt.option,
    mt.tbody = mt.tfoot = mt.colgroup = mt.caption = mt.thead,
    mt.th = mt.td,
    u.extend({
        clone: function(t, e, i) {
            var n, o, s, r, a, l = u.contains(t.ownerDocument, t);
            if (d.html5Clone || u.isXMLDoc(t) || !ot.test("<" + t.nodeName + ">") ? s = t.cloneNode(!0) : (gt.innerHTML = t.outerHTML,
            gt.removeChild(s = gt.firstChild)),
            !(d.noCloneEvent && d.noCloneChecked || 1 !== t.nodeType && 11 !== t.nodeType || u.isXMLDoc(t)))
                for (n = vt(s),
                a = vt(t),
                r = 0; null != (o = a[r]); ++r)
                    n[r] && Ct(o, n[r]);
            if (e)
                if (i)
                    for (a = a || vt(t),
                    n = n || vt(s),
                    r = 0; null != (o = a[r]); r++)
                        kt(o, n[r]);
                else
                    kt(t, s);
            return (n = vt(s, "script")).length > 0 && Tt(n, !l && vt(t, "script")),
            n = a = o = null,
            s
        },
        buildFragment: function(t, e, i, n) {
            for (var o, s, r, a, l, c, p, h = t.length, f = et(e), m = [], g = 0; h > g; g++)
                if ((s = t[g]) || 0 === s)
                    if ("object" === u.type(s))
                        u.merge(m, s.nodeType ? [s] : s);
                    else if (ct.test(s)) {
                        for (a = a || f.appendChild(e.createElement("div")),
                        l = (at.exec(s) || ["", ""])[1].toLowerCase(),
                        p = mt[l] || mt._default,
                        a.innerHTML = p[1] + s.replace(rt, "<$1></$2>") + p[2],
                        o = p[0]; o--; )
                            a = a.lastChild;
                        if (!d.leadingWhitespace && st.test(s) && m.push(e.createTextNode(st.exec(s)[0])),
                        !d.tbody)
                            for (o = (s = "table" !== l || lt.test(s) ? "<table>" !== p[1] || lt.test(s) ? 0 : a : a.firstChild) && s.childNodes.length; o--; )
                                u.nodeName(c = s.childNodes[o], "tbody") && !c.childNodes.length && s.removeChild(c);
                        for (u.merge(m, a.childNodes),
                        a.textContent = ""; a.firstChild; )
                            a.removeChild(a.firstChild);
                        a = f.lastChild
                    } else
                        m.push(e.createTextNode(s));
            for (a && f.removeChild(a),
            d.appendChecked || u.grep(vt(m, "input"), yt),
            g = 0; s = m[g++]; )
                if ((!n || -1 === u.inArray(s, n)) && (r = u.contains(s.ownerDocument, s),
                a = vt(f.appendChild(s), "script"),
                r && Tt(a),
                i))
                    for (o = 0; s = a[o++]; )
                        ut.test(s.type || "") && i.push(s);
            return a = null,
            f
        },
        cleanData: function(t, e) {
            for (var n, o, s, r, a = 0, l = u.expando, c = u.cache, p = d.deleteExpando, h = u.event.special; null != (n = t[a]); a++)
                if ((e || u.acceptData(n)) && (r = (s = n[l]) && c[s])) {
                    if (r.events)
                        for (o in r.events)
                            h[o] ? u.event.remove(n, o) : u.removeEvent(n, o, r.handle);
                    c[s] && (delete c[s],
                    p ? delete n[l] : typeof n.removeAttribute !== j ? n.removeAttribute(l) : n[l] = null,
                    i.push(s))
                }
        }
    }),
    u.fn.extend({
        text: function(t) {
            return U(this, function(t) {
                return void 0 === t ? u.text(this) : this.empty().append((this[0] && this[0].ownerDocument || C).createTextNode(t))
            }, null, t, arguments.length)
        },
        append: function() {
            return this.domManip(arguments, function(t) {
                1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || bt(this, t).appendChild(t)
            })
        },
        prepend: function() {
            return this.domManip(arguments, function(t) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var e = bt(this, t);
                    e.insertBefore(t, e.firstChild)
                }
            })
        },
        before: function() {
            return this.domManip(arguments, function(t) {
                this.parentNode && this.parentNode.insertBefore(t, this)
            })
        },
        after: function() {
            return this.domManip(arguments, function(t) {
                this.parentNode && this.parentNode.insertBefore(t, this.nextSibling)
            })
        },
        remove: function(t, e) {
            for (var i, n = t ? u.filter(t, this) : this, o = 0; null != (i = n[o]); o++)
                e || 1 !== i.nodeType || u.cleanData(vt(i)),
                i.parentNode && (e && u.contains(i.ownerDocument, i) && Tt(vt(i, "script")),
                i.parentNode.removeChild(i));
            return this
        },
        empty: function() {
            for (var t, e = 0; null != (t = this[e]); e++) {
                for (1 === t.nodeType && u.cleanData(vt(t, !1)); t.firstChild; )
                    t.removeChild(t.firstChild);
                t.options && u.nodeName(t, "select") && (t.options.length = 0)
            }
            return this
        },
        clone: function(t, e) {
            return t = null != t && t,
            e = null == e ? t : e,
            this.map(function() {
                return u.clone(this, t, e)
            })
        },
        html: function(t) {
            return U(this, function(t) {
                var e = this[0] || {}
                  , i = 0
                  , n = this.length;
                if (void 0 === t)
                    return 1 === e.nodeType ? e.innerHTML.replace(nt, "") : void 0;
                if (!("string" != typeof t || dt.test(t) || !d.htmlSerialize && ot.test(t) || !d.leadingWhitespace && st.test(t) || mt[(at.exec(t) || ["", ""])[1].toLowerCase()])) {
                    t = t.replace(rt, "<$1></$2>");
                    try {
                        for (; n > i; i++)
                            1 === (e = this[i] || {}).nodeType && (u.cleanData(vt(e, !1)),
                            e.innerHTML = t);
                        e = 0
                    } catch (t) {}
                }
                e && this.empty().append(t)
            }, null, t, arguments.length)
        },
        replaceWith: function() {
            var t = arguments[0];
            return this.domManip(arguments, function(e) {
                t = this.parentNode,
                u.cleanData(vt(this)),
                t && t.replaceChild(e, this)
            }),
            t && (t.length || t.nodeType) ? this : this.remove()
        },
        detach: function(t) {
            return this.remove(t, !0)
        },
        domManip: function(t, e) {
            t = o.apply([], t);
            var i, n, s, r, a, l, c = 0, p = this.length, h = this, f = p - 1, m = t[0], g = u.isFunction(m);
            if (g || p > 1 && "string" == typeof m && !d.checkClone && pt.test(m))
                return this.each(function(i) {
                    var n = h.eq(i);
                    g && (t[0] = m.call(this, i, n.html())),
                    n.domManip(t, e)
                });
            if (p && (i = (l = u.buildFragment(t, this[0].ownerDocument, !1, this)).firstChild,
            1 === l.childNodes.length && (l = i),
            i)) {
                for (s = (r = u.map(vt(l, "script"), wt)).length; p > c; c++)
                    n = l,
                    c !== f && (n = u.clone(n, !0, !0),
                    s && u.merge(r, vt(n, "script"))),
                    e.call(this[c], n, c);
                if (s)
                    for (a = r[r.length - 1].ownerDocument,
                    u.map(r, xt),
                    c = 0; s > c; c++)
                        n = r[c],
                        ut.test(n.type || "") && !u._data(n, "globalEval") && u.contains(a, n) && (n.src ? u._evalUrl && u._evalUrl(n.src) : u.globalEval((n.text || n.textContent || n.innerHTML || "").replace(ft, "")));
                l = i = null
            }
            return this
        }
    }),
    u.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function(t, e) {
        u.fn[t] = function(t) {
            for (var i, n = 0, o = [], r = u(t), a = r.length - 1; a >= n; n++)
                i = n === a ? this : this.clone(!0),
                u(r[n])[e](i),
                s.apply(o, i.get());
            return this.pushStack(o)
        }
    });
    var St, $t = {};
    function Et(e, i) {
        var n, o = u(i.createElement(e)).appendTo(i.body), s = t.getDefaultComputedStyle && (n = t.getDefaultComputedStyle(o[0])) ? n.display : u.css(o[0], "display");
        return o.detach(),
        s
    }
    function It(t) {
        var e = C
          , i = $t[t];
        return i || ("none" !== (i = Et(t, e)) && i || ((e = ((St = (St || u("<iframe frameborder='0' width='0' height='0'/>")).appendTo(e.documentElement))[0].contentWindow || St[0].contentDocument).document).write(),
        e.close(),
        i = Et(t, e),
        St.detach()),
        $t[t] = i),
        i
    }
    !function() {
        var t;
        d.shrinkWrapBlocks = function() {
            return null != t ? t : (t = !1,
            (i = C.getElementsByTagName("body")[0]) && i.style ? (e = C.createElement("div"),
            (n = C.createElement("div")).style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px",
            i.appendChild(n).appendChild(e),
            typeof e.style.zoom !== j && (e.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:1px;width:1px;zoom:1",
            e.appendChild(C.createElement("div")).style.width = "5px",
            t = 3 !== e.offsetWidth),
            i.removeChild(n),
            t) : void 0);
            var e, i, n
        }
    }();
    var At, _t, Nt = /^margin/, Pt = new RegExp("^(" + F + ")(?!px)[a-z%]+$","i"), Dt = /^(top|right|bottom|left)$/;
    function Ot(t, e) {
        return {
            get: function() {
                var i = t();
                if (null != i)
                    return i ? void delete this.get : (this.get = e).apply(this, arguments)
            }
        }
    }
    t.getComputedStyle ? (At = function(t) {
        return t.ownerDocument.defaultView.getComputedStyle(t, null)
    }
    ,
    _t = function(t, e, i) {
        var n, o, s, r, a = t.style;
        return r = (i = i || At(t)) ? i.getPropertyValue(e) || i[e] : void 0,
        i && ("" !== r || u.contains(t.ownerDocument, t) || (r = u.style(t, e)),
        Pt.test(r) && Nt.test(e) && (n = a.width,
        o = a.minWidth,
        s = a.maxWidth,
        a.minWidth = a.maxWidth = a.width = r,
        r = i.width,
        a.width = n,
        a.minWidth = o,
        a.maxWidth = s)),
        void 0 === r ? r : r + ""
    }
    ) : C.documentElement.currentStyle && (At = function(t) {
        return t.currentStyle
    }
    ,
    _t = function(t, e, i) {
        var n, o, s, r, a = t.style;
        return null == (r = (i = i || At(t)) ? i[e] : void 0) && a && a[e] && (r = a[e]),
        Pt.test(r) && !Dt.test(e) && (n = a.left,
        (s = (o = t.runtimeStyle) && o.left) && (o.left = t.currentStyle.left),
        a.left = "fontSize" === e ? "1em" : r,
        r = a.pixelLeft + "px",
        a.left = n,
        s && (o.left = s)),
        void 0 === r ? r : r + "" || "auto"
    }
    ),
    function() {
        var e, i, n, o, s, r, a;
        if ((e = C.createElement("div")).innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",
        i = (n = e.getElementsByTagName("a")[0]) && n.style) {
            function l() {
                var e, i, n, l;
                (i = C.getElementsByTagName("body")[0]) && i.style && (e = C.createElement("div"),
                (n = C.createElement("div")).style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px",
                i.appendChild(n).appendChild(e),
                e.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute",
                o = s = !1,
                a = !0,
                t.getComputedStyle && (o = "1%" !== (t.getComputedStyle(e, null) || {}).top,
                s = "4px" === (t.getComputedStyle(e, null) || {
                    width: "4px"
                }).width,
                (l = e.appendChild(C.createElement("div"))).style.cssText = e.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0",
                l.style.marginRight = l.style.width = "0",
                e.style.width = "1px",
                a = !parseFloat((t.getComputedStyle(l, null) || {}).marginRight)),
                e.innerHTML = "<table><tr><td></td><td>t</td></tr></table>",
                (l = e.getElementsByTagName("td"))[0].style.cssText = "margin:0;border:0;padding:0;display:none",
                (r = 0 === l[0].offsetHeight) && (l[0].style.display = "",
                l[1].style.display = "none",
                r = 0 === l[0].offsetHeight),
                i.removeChild(n))
            }
            i.cssText = "float:left;opacity:.5",
            d.opacity = "0.5" === i.opacity,
            d.cssFloat = !!i.cssFloat,
            e.style.backgroundClip = "content-box",
            e.cloneNode(!0).style.backgroundClip = "",
            d.clearCloneStyle = "content-box" === e.style.backgroundClip,
            d.boxSizing = "" === i.boxSizing || "" === i.MozBoxSizing || "" === i.WebkitBoxSizing,
            u.extend(d, {
                reliableHiddenOffsets: function() {
                    return null == r && l(),
                    r
                },
                boxSizingReliable: function() {
                    return null == s && l(),
                    s
                },
                pixelPosition: function() {
                    return null == o && l(),
                    o
                },
                reliableMarginRight: function() {
                    return null == a && l(),
                    a
                }
            })
        }
    }(),
    u.swap = function(t, e, i, n) {
        var o, s, r = {};
        for (s in e)
            r[s] = t.style[s],
            t.style[s] = e[s];
        for (s in o = i.apply(t, n || []),
        e)
            t.style[s] = r[s];
        return o
    }
    ;
    var jt = /alpha\([^)]*\)/i
      , Lt = /opacity\s*=\s*([^)]*)/
      , Ht = /^(none|table(?!-c[ea]).+)/
      , Mt = new RegExp("^(" + F + ")(.*)$","i")
      , zt = new RegExp("^([+-])=(" + F + ")","i")
      , Wt = {
        position: "absolute",
        visibility: "hidden",
        display: "block"
    }
      , Rt = {
        letterSpacing: "0",
        fontWeight: "400"
    }
      , Ft = ["Webkit", "O", "Moz", "ms"];
    function Bt(t, e) {
        if (e in t)
            return e;
        for (var i = e.charAt(0).toUpperCase() + e.slice(1), n = e, o = Ft.length; o--; )
            if ((e = Ft[o] + i)in t)
                return e;
        return n
    }
    function qt(t, e) {
        for (var i, n, o, s = [], r = 0, a = t.length; a > r; r++)
            (n = t[r]).style && (s[r] = u._data(n, "olddisplay"),
            i = n.style.display,
            e ? (s[r] || "none" !== i || (n.style.display = ""),
            "" === n.style.display && q(n) && (s[r] = u._data(n, "olddisplay", It(n.nodeName)))) : (o = q(n),
            (i && "none" !== i || !o) && u._data(n, "olddisplay", o ? i : u.css(n, "display"))));
        for (r = 0; a > r; r++)
            (n = t[r]).style && (e && "none" !== n.style.display && "" !== n.style.display || (n.style.display = e ? s[r] || "" : "none"));
        return t
    }
    function Ut(t, e, i) {
        var n = Mt.exec(e);
        return n ? Math.max(0, n[1] - (i || 0)) + (n[2] || "px") : e
    }
    function Xt(t, e, i, n, o) {
        for (var s = i === (n ? "border" : "content") ? 4 : "width" === e ? 1 : 0, r = 0; 4 > s; s += 2)
            "margin" === i && (r += u.css(t, i + B[s], !0, o)),
            n ? ("content" === i && (r -= u.css(t, "padding" + B[s], !0, o)),
            "margin" !== i && (r -= u.css(t, "border" + B[s] + "Width", !0, o))) : (r += u.css(t, "padding" + B[s], !0, o),
            "padding" !== i && (r += u.css(t, "border" + B[s] + "Width", !0, o)));
        return r
    }
    function Vt(t, e, i) {
        var n = !0
          , o = "width" === e ? t.offsetWidth : t.offsetHeight
          , s = At(t)
          , r = d.boxSizing && "border-box" === u.css(t, "boxSizing", !1, s);
        if (0 >= o || null == o) {
            if ((0 > (o = _t(t, e, s)) || null == o) && (o = t.style[e]),
            Pt.test(o))
                return o;
            n = r && (d.boxSizingReliable() || o === t.style[e]),
            o = parseFloat(o) || 0
        }
        return o + Xt(t, e, i || (r ? "border" : "content"), n, s) + "px"
    }
    function Yt(t, e, i, n, o) {
        return new Yt.prototype.init(t,e,i,n,o)
    }
    u.extend({
        cssHooks: {
            opacity: {
                get: function(t, e) {
                    if (e) {
                        var i = _t(t, "opacity");
                        return "" === i ? "1" : i
                    }
                }
            }
        },
        cssNumber: {
            columnCount: !0,
            fillOpacity: !0,
            flexGrow: !0,
            flexShrink: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {
            float: d.cssFloat ? "cssFloat" : "styleFloat"
        },
        style: function(t, e, i, n) {
            if (t && 3 !== t.nodeType && 8 !== t.nodeType && t.style) {
                var o, s, r, a = u.camelCase(e), l = t.style;
                if (e = u.cssProps[a] || (u.cssProps[a] = Bt(l, a)),
                r = u.cssHooks[e] || u.cssHooks[a],
                void 0 === i)
                    return r && "get"in r && void 0 !== (o = r.get(t, !1, n)) ? o : l[e];
                if ("string" === (s = typeof i) && (o = zt.exec(i)) && (i = (o[1] + 1) * o[2] + parseFloat(u.css(t, e)),
                s = "number"),
                null != i && i == i && ("number" !== s || u.cssNumber[a] || (i += "px"),
                d.clearCloneStyle || "" !== i || 0 !== e.indexOf("background") || (l[e] = "inherit"),
                !(r && "set"in r && void 0 === (i = r.set(t, i, n)))))
                    try {
                        l[e] = i
                    } catch (t) {}
            }
        },
        css: function(t, e, i, n) {
            var o, s, r, a = u.camelCase(e);
            return e = u.cssProps[a] || (u.cssProps[a] = Bt(t.style, a)),
            (r = u.cssHooks[e] || u.cssHooks[a]) && "get"in r && (s = r.get(t, !0, i)),
            void 0 === s && (s = _t(t, e, n)),
            "normal" === s && e in Rt && (s = Rt[e]),
            "" === i || i ? (o = parseFloat(s),
            !0 === i || u.isNumeric(o) ? o || 0 : s) : s
        }
    }),
    u.each(["height", "width"], function(t, e) {
        u.cssHooks[e] = {
            get: function(t, i, n) {
                return i ? Ht.test(u.css(t, "display")) && 0 === t.offsetWidth ? u.swap(t, Wt, function() {
                    return Vt(t, e, n)
                }) : Vt(t, e, n) : void 0
            },
            set: function(t, i, n) {
                var o = n && At(t);
                return Ut(0, i, n ? Xt(t, e, n, d.boxSizing && "border-box" === u.css(t, "boxSizing", !1, o), o) : 0)
            }
        }
    }),
    d.opacity || (u.cssHooks.opacity = {
        get: function(t, e) {
            return Lt.test((e && t.currentStyle ? t.currentStyle.filter : t.style.filter) || "") ? .01 * parseFloat(RegExp.$1) + "" : e ? "1" : ""
        },
        set: function(t, e) {
            var i = t.style
              , n = t.currentStyle
              , o = u.isNumeric(e) ? "alpha(opacity=" + 100 * e + ")" : ""
              , s = n && n.filter || i.filter || "";
            i.zoom = 1,
            (e >= 1 || "" === e) && "" === u.trim(s.replace(jt, "")) && i.removeAttribute && (i.removeAttribute("filter"),
            "" === e || n && !n.filter) || (i.filter = jt.test(s) ? s.replace(jt, o) : s + " " + o)
        }
    }),
    u.cssHooks.marginRight = Ot(d.reliableMarginRight, function(t, e) {
        return e ? u.swap(t, {
            display: "inline-block"
        }, _t, [t, "marginRight"]) : void 0
    }),
    u.each({
        margin: "",
        padding: "",
        border: "Width"
    }, function(t, e) {
        u.cssHooks[t + e] = {
            expand: function(i) {
                for (var n = 0, o = {}, s = "string" == typeof i ? i.split(" ") : [i]; 4 > n; n++)
                    o[t + B[n] + e] = s[n] || s[n - 2] || s[0];
                return o
            }
        },
        Nt.test(t) || (u.cssHooks[t + e].set = Ut)
    }),
    u.fn.extend({
        css: function(t, e) {
            return U(this, function(t, e, i) {
                var n, o, s = {}, r = 0;
                if (u.isArray(e)) {
                    for (n = At(t),
                    o = e.length; o > r; r++)
                        s[e[r]] = u.css(t, e[r], !1, n);
                    return s
                }
                return void 0 !== i ? u.style(t, e, i) : u.css(t, e)
            }, t, e, arguments.length > 1)
        },
        show: function() {
            return qt(this, !0)
        },
        hide: function() {
            return qt(this)
        },
        toggle: function(t) {
            return "boolean" == typeof t ? t ? this.show() : this.hide() : this.each(function() {
                q(this) ? u(this).show() : u(this).hide()
            })
        }
    }),
    u.Tween = Yt,
    Yt.prototype = {
        constructor: Yt,
        init: function(t, e, i, n, o, s) {
            this.elem = t,
            this.prop = i,
            this.easing = o || "swing",
            this.options = e,
            this.start = this.now = this.cur(),
            this.end = n,
            this.unit = s || (u.cssNumber[i] ? "" : "px")
        },
        cur: function() {
            var t = Yt.propHooks[this.prop];
            return t && t.get ? t.get(this) : Yt.propHooks._default.get(this)
        },
        run: function(t) {
            var e, i = Yt.propHooks[this.prop];
            return this.pos = e = this.options.duration ? u.easing[this.easing](t, this.options.duration * t, 0, 1, this.options.duration) : t,
            this.now = (this.end - this.start) * e + this.start,
            this.options.step && this.options.step.call(this.elem, this.now, this),
            i && i.set ? i.set(this) : Yt.propHooks._default.set(this),
            this
        }
    },
    Yt.prototype.init.prototype = Yt.prototype,
    Yt.propHooks = {
        _default: {
            get: function(t) {
                var e;
                return null == t.elem[t.prop] || t.elem.style && null != t.elem.style[t.prop] ? (e = u.css(t.elem, t.prop, "")) && "auto" !== e ? e : 0 : t.elem[t.prop]
            },
            set: function(t) {
                u.fx.step[t.prop] ? u.fx.step[t.prop](t) : t.elem.style && (null != t.elem.style[u.cssProps[t.prop]] || u.cssHooks[t.prop]) ? u.style(t.elem, t.prop, t.now + t.unit) : t.elem[t.prop] = t.now
            }
        }
    },
    Yt.propHooks.scrollTop = Yt.propHooks.scrollLeft = {
        set: function(t) {
            t.elem.nodeType && t.elem.parentNode && (t.elem[t.prop] = t.now)
        }
    },
    u.easing = {
        linear: function(t) {
            return t
        },
        swing: function(t) {
            return .5 - Math.cos(t * Math.PI) / 2
        }
    },
    u.fx = Yt.prototype.init,
    u.fx.step = {};
    var Qt, Kt, Zt = /^(?:toggle|show|hide)$/, Gt = new RegExp("^(?:([+-])=|)(" + F + ")([a-z%]*)$","i"), Jt = /queueHooks$/, te = [function(t, e, i) {
        var n, o, s, r, a, l, c, p = this, h = {}, f = t.style, m = t.nodeType && q(t), g = u._data(t, "fxshow");
        for (n in i.queue || (null == (a = u._queueHooks(t, "fx")).unqueued && (a.unqueued = 0,
        l = a.empty.fire,
        a.empty.fire = function() {
            a.unqueued || l()
        }
        ),
        a.unqueued++,
        p.always(function() {
            p.always(function() {
                a.unqueued--,
                u.queue(t, "fx").length || a.empty.fire()
            })
        })),
        1 === t.nodeType && ("height"in e || "width"in e) && (i.overflow = [f.overflow, f.overflowX, f.overflowY],
        c = u.css(t, "display"),
        "inline" === ("none" === c ? u._data(t, "olddisplay") || It(t.nodeName) : c) && "none" === u.css(t, "float") && (d.inlineBlockNeedsLayout && "inline" !== It(t.nodeName) ? f.zoom = 1 : f.display = "inline-block")),
        i.overflow && (f.overflow = "hidden",
        d.shrinkWrapBlocks() || p.always(function() {
            f.overflow = i.overflow[0],
            f.overflowX = i.overflow[1],
            f.overflowY = i.overflow[2]
        })),
        e)
            if (o = e[n],
            Zt.exec(o)) {
                if (delete e[n],
                s = s || "toggle" === o,
                o === (m ? "hide" : "show")) {
                    if ("show" !== o || !g || void 0 === g[n])
                        continue;
                    m = !0
                }
                h[n] = g && g[n] || u.style(t, n)
            } else
                c = void 0;
        if (u.isEmptyObject(h))
            "inline" === ("none" === c ? It(t.nodeName) : c) && (f.display = c);
        else
            for (n in g ? "hidden"in g && (m = g.hidden) : g = u._data(t, "fxshow", {}),
            s && (g.hidden = !m),
            m ? u(t).show() : p.done(function() {
                u(t).hide()
            }),
            p.done(function() {
                var e;
                for (e in u._removeData(t, "fxshow"),
                h)
                    u.style(t, e, h[e])
            }),
            h)
                r = oe(m ? g[n] : 0, n, p),
                n in g || (g[n] = r.start,
                m && (r.end = r.start,
                r.start = "width" === n || "height" === n ? 1 : 0))
    }
    ], ee = {
        "*": [function(t, e) {
            var i = this.createTween(t, e)
              , n = i.cur()
              , o = Gt.exec(e)
              , s = o && o[3] || (u.cssNumber[t] ? "" : "px")
              , r = (u.cssNumber[t] || "px" !== s && +n) && Gt.exec(u.css(i.elem, t))
              , a = 1
              , l = 20;
            if (r && r[3] !== s) {
                s = s || r[3],
                o = o || [],
                r = +n || 1;
                do {
                    r /= a = a || ".5",
                    u.style(i.elem, t, r + s)
                } while (a !== (a = i.cur() / n) && 1 !== a && --l)
            }
            return o && (r = i.start = +r || +n || 0,
            i.unit = s,
            i.end = o[1] ? r + (o[1] + 1) * o[2] : +o[2]),
            i
        }
        ]
    };
    function ie() {
        return setTimeout(function() {
            Qt = void 0
        }),
        Qt = u.now()
    }
    function ne(t, e) {
        var i, n = {
            height: t
        }, o = 0;
        for (e = e ? 1 : 0; 4 > o; o += 2 - e)
            n["margin" + (i = B[o])] = n["padding" + i] = t;
        return e && (n.opacity = n.width = t),
        n
    }
    function oe(t, e, i) {
        for (var n, o = (ee[e] || []).concat(ee["*"]), s = 0, r = o.length; r > s; s++)
            if (n = o[s].call(i, e, t))
                return n
    }
    function se(t, e, i) {
        var n, o, s = 0, r = te.length, a = u.Deferred().always(function() {
            delete l.elem
        }), l = function() {
            if (o)
                return !1;
            for (var e = Qt || ie(), i = Math.max(0, c.startTime + c.duration - e), n = 1 - (i / c.duration || 0), s = 0, r = c.tweens.length; r > s; s++)
                c.tweens[s].run(n);
            return a.notifyWith(t, [c, n, i]),
            1 > n && r ? i : (a.resolveWith(t, [c]),
            !1)
        }, c = a.promise({
            elem: t,
            props: u.extend({}, e),
            opts: u.extend(!0, {
                specialEasing: {}
            }, i),
            originalProperties: e,
            originalOptions: i,
            startTime: Qt || ie(),
            duration: i.duration,
            tweens: [],
            createTween: function(e, i) {
                var n = u.Tween(t, c.opts, e, i, c.opts.specialEasing[e] || c.opts.easing);
                return c.tweens.push(n),
                n
            },
            stop: function(e) {
                var i = 0
                  , n = e ? c.tweens.length : 0;
                if (o)
                    return this;
                for (o = !0; n > i; i++)
                    c.tweens[i].run(1);
                return e ? a.resolveWith(t, [c, e]) : a.rejectWith(t, [c, e]),
                this
            }
        }), d = c.props;
        for (function(t, e) {
            var i, n, o, s, r;
            for (i in t)
                if (o = e[n = u.camelCase(i)],
                s = t[i],
                u.isArray(s) && (o = s[1],
                s = t[i] = s[0]),
                i !== n && (t[n] = s,
                delete t[i]),
                (r = u.cssHooks[n]) && "expand"in r)
                    for (i in s = r.expand(s),
                    delete t[n],
                    s)
                        i in t || (t[i] = s[i],
                        e[i] = o);
                else
                    e[n] = o
        }(d, c.opts.specialEasing); r > s; s++)
            if (n = te[s].call(c, t, d, c.opts))
                return n;
        return u.map(d, oe, c),
        u.isFunction(c.opts.start) && c.opts.start.call(t, c),
        u.fx.timer(u.extend(l, {
            elem: t,
            anim: c,
            queue: c.opts.queue
        })),
        c.progress(c.opts.progress).done(c.opts.done, c.opts.complete).fail(c.opts.fail).always(c.opts.always)
    }
    u.Animation = u.extend(se, {
        tweener: function(t, e) {
            u.isFunction(t) ? (e = t,
            t = ["*"]) : t = t.split(" ");
            for (var i, n = 0, o = t.length; o > n; n++)
                i = t[n],
                ee[i] = ee[i] || [],
                ee[i].unshift(e)
        },
        prefilter: function(t, e) {
            e ? te.unshift(t) : te.push(t)
        }
    }),
    u.speed = function(t, e, i) {
        var n = t && "object" == typeof t ? u.extend({}, t) : {
            complete: i || !i && e || u.isFunction(t) && t,
            duration: t,
            easing: i && e || e && !u.isFunction(e) && e
        };
        return n.duration = u.fx.off ? 0 : "number" == typeof n.duration ? n.duration : n.duration in u.fx.speeds ? u.fx.speeds[n.duration] : u.fx.speeds._default,
        (null == n.queue || !0 === n.queue) && (n.queue = "fx"),
        n.old = n.complete,
        n.complete = function() {
            u.isFunction(n.old) && n.old.call(this),
            n.queue && u.dequeue(this, n.queue)
        }
        ,
        n
    }
    ,
    u.fn.extend({
        fadeTo: function(t, e, i, n) {
            return this.filter(q).css("opacity", 0).show().end().animate({
                opacity: e
            }, t, i, n)
        },
        animate: function(t, e, i, n) {
            var o = u.isEmptyObject(t)
              , s = u.speed(e, i, n)
              , r = function() {
                var e = se(this, u.extend({}, t), s);
                (o || u._data(this, "finish")) && e.stop(!0)
            };
            return r.finish = r,
            o || !1 === s.queue ? this.each(r) : this.queue(s.queue, r)
        },
        stop: function(t, e, i) {
            var n = function(t) {
                var e = t.stop;
                delete t.stop,
                e(i)
            };
            return "string" != typeof t && (i = e,
            e = t,
            t = void 0),
            e && !1 !== t && this.queue(t || "fx", []),
            this.each(function() {
                var e = !0
                  , o = null != t && t + "queueHooks"
                  , s = u.timers
                  , r = u._data(this);
                if (o)
                    r[o] && r[o].stop && n(r[o]);
                else
                    for (o in r)
                        r[o] && r[o].stop && Jt.test(o) && n(r[o]);
                for (o = s.length; o--; )
                    s[o].elem !== this || null != t && s[o].queue !== t || (s[o].anim.stop(i),
                    e = !1,
                    s.splice(o, 1));
                (e || !i) && u.dequeue(this, t)
            })
        },
        finish: function(t) {
            return !1 !== t && (t = t || "fx"),
            this.each(function() {
                var e, i = u._data(this), n = i[t + "queue"], o = i[t + "queueHooks"], s = u.timers, r = n ? n.length : 0;
                for (i.finish = !0,
                u.queue(this, t, []),
                o && o.stop && o.stop.call(this, !0),
                e = s.length; e--; )
                    s[e].elem === this && s[e].queue === t && (s[e].anim.stop(!0),
                    s.splice(e, 1));
                for (e = 0; r > e; e++)
                    n[e] && n[e].finish && n[e].finish.call(this);
                delete i.finish
            })
        }
    }),
    u.each(["toggle", "show", "hide"], function(t, e) {
        var i = u.fn[e];
        u.fn[e] = function(t, n, o) {
            return null == t || "boolean" == typeof t ? i.apply(this, arguments) : this.animate(ne(e, !0), t, n, o)
        }
    }),
    u.each({
        slideDown: ne("show"),
        slideUp: ne("hide"),
        slideToggle: ne("toggle"),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, function(t, e) {
        u.fn[t] = function(t, i, n) {
            return this.animate(e, t, i, n)
        }
    }),
    u.timers = [],
    u.fx.tick = function() {
        var t, e = u.timers, i = 0;
        for (Qt = u.now(); i < e.length; i++)
            (t = e[i])() || e[i] !== t || e.splice(i--, 1);
        e.length || u.fx.stop(),
        Qt = void 0
    }
    ,
    u.fx.timer = function(t) {
        u.timers.push(t),
        t() ? u.fx.start() : u.timers.pop()
    }
    ,
    u.fx.interval = 13,
    u.fx.start = function() {
        Kt || (Kt = setInterval(u.fx.tick, u.fx.interval))
    }
    ,
    u.fx.stop = function() {
        clearInterval(Kt),
        Kt = null
    }
    ,
    u.fx.speeds = {
        slow: 600,
        fast: 200,
        _default: 400
    },
    u.fn.delay = function(t, e) {
        return t = u.fx && u.fx.speeds[t] || t,
        e = e || "fx",
        this.queue(e, function(e, i) {
            var n = setTimeout(e, t);
            i.stop = function() {
                clearTimeout(n)
            }
        })
    }
    ,
    function() {
        var t, e, i, n, o;
        (e = C.createElement("div")).setAttribute("className", "t"),
        e.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",
        n = e.getElementsByTagName("a")[0],
        o = (i = C.createElement("select")).appendChild(C.createElement("option")),
        t = e.getElementsByTagName("input")[0],
        n.style.cssText = "top:1px",
        d.getSetAttribute = "t" !== e.className,
        d.style = /top/.test(n.getAttribute("style")),
        d.hrefNormalized = "/a" === n.getAttribute("href"),
        d.checkOn = !!t.value,
        d.optSelected = o.selected,
        d.enctype = !!C.createElement("form").enctype,
        i.disabled = !0,
        d.optDisabled = !o.disabled,
        (t = C.createElement("input")).setAttribute("value", ""),
        d.input = "" === t.getAttribute("value"),
        t.value = "t",
        t.setAttribute("type", "radio"),
        d.radioValue = "t" === t.value
    }();
    var re = /\r/g;
    u.fn.extend({
        val: function(t) {
            var e, i, n, o = this[0];
            return arguments.length ? (n = u.isFunction(t),
            this.each(function(i) {
                var o;
                1 === this.nodeType && (null == (o = n ? t.call(this, i, u(this).val()) : t) ? o = "" : "number" == typeof o ? o += "" : u.isArray(o) && (o = u.map(o, function(t) {
                    return null == t ? "" : t + ""
                })),
                (e = u.valHooks[this.type] || u.valHooks[this.nodeName.toLowerCase()]) && "set"in e && void 0 !== e.set(this, o, "value") || (this.value = o))
            })) : o ? (e = u.valHooks[o.type] || u.valHooks[o.nodeName.toLowerCase()]) && "get"in e && void 0 !== (i = e.get(o, "value")) ? i : "string" == typeof (i = o.value) ? i.replace(re, "") : null == i ? "" : i : void 0
        }
    }),
    u.extend({
        valHooks: {
            option: {
                get: function(t) {
                    var e = u.find.attr(t, "value");
                    return null != e ? e : u.trim(u.text(t))
                }
            },
            select: {
                get: function(t) {
                    for (var e, i, n = t.options, o = t.selectedIndex, s = "select-one" === t.type || 0 > o, r = s ? null : [], a = s ? o + 1 : n.length, l = 0 > o ? a : s ? o : 0; a > l; l++)
                        if (!(!(i = n[l]).selected && l !== o || (d.optDisabled ? i.disabled : null !== i.getAttribute("disabled")) || i.parentNode.disabled && u.nodeName(i.parentNode, "optgroup"))) {
                            if (e = u(i).val(),
                            s)
                                return e;
                            r.push(e)
                        }
                    return r
                },
                set: function(t, e) {
                    for (var i, n, o = t.options, s = u.makeArray(e), r = o.length; r--; )
                        if (n = o[r],
                        u.inArray(u.valHooks.option.get(n), s) >= 0)
                            try {
                                n.selected = i = !0
                            } catch (t) {
                                n.scrollHeight
                            }
                        else
                            n.selected = !1;
                    return i || (t.selectedIndex = -1),
                    o
                }
            }
        }
    }),
    u.each(["radio", "checkbox"], function() {
        u.valHooks[this] = {
            set: function(t, e) {
                return u.isArray(e) ? t.checked = u.inArray(u(t).val(), e) >= 0 : void 0
            }
        },
        d.checkOn || (u.valHooks[this].get = function(t) {
            return null === t.getAttribute("value") ? "on" : t.value
        }
        )
    });
    var ae, le, ce = u.expr.attrHandle, de = /^(?:checked|selected)$/i, pe = d.getSetAttribute, ue = d.input;
    u.fn.extend({
        attr: function(t, e) {
            return U(this, u.attr, t, e, arguments.length > 1)
        },
        removeAttr: function(t) {
            return this.each(function() {
                u.removeAttr(this, t)
            })
        }
    }),
    u.extend({
        attr: function(t, e, i) {
            var n, o, s = t.nodeType;
            if (t && 3 !== s && 8 !== s && 2 !== s)
                return typeof t.getAttribute === j ? u.prop(t, e, i) : (1 === s && u.isXMLDoc(t) || (e = e.toLowerCase(),
                n = u.attrHooks[e] || (u.expr.match.bool.test(e) ? le : ae)),
                void 0 === i ? n && "get"in n && null !== (o = n.get(t, e)) ? o : null == (o = u.find.attr(t, e)) ? void 0 : o : null !== i ? n && "set"in n && void 0 !== (o = n.set(t, i, e)) ? o : (t.setAttribute(e, i + ""),
                i) : void u.removeAttr(t, e))
        },
        removeAttr: function(t, e) {
            var i, n, o = 0, s = e && e.match(_);
            if (s && 1 === t.nodeType)
                for (; i = s[o++]; )
                    n = u.propFix[i] || i,
                    u.expr.match.bool.test(i) ? ue && pe || !de.test(i) ? t[n] = !1 : t[u.camelCase("default-" + i)] = t[n] = !1 : u.attr(t, i, ""),
                    t.removeAttribute(pe ? i : n)
        },
        attrHooks: {
            type: {
                set: function(t, e) {
                    if (!d.radioValue && "radio" === e && u.nodeName(t, "input")) {
                        var i = t.value;
                        return t.setAttribute("type", e),
                        i && (t.value = i),
                        e
                    }
                }
            }
        }
    }),
    le = {
        set: function(t, e, i) {
            return !1 === e ? u.removeAttr(t, i) : ue && pe || !de.test(i) ? t.setAttribute(!pe && u.propFix[i] || i, i) : t[u.camelCase("default-" + i)] = t[i] = !0,
            i
        }
    },
    u.each(u.expr.match.bool.source.match(/\w+/g), function(t, e) {
        var i = ce[e] || u.find.attr;
        ce[e] = ue && pe || !de.test(e) ? function(t, e, n) {
            var o, s;
            return n || (s = ce[e],
            ce[e] = o,
            o = null != i(t, e, n) ? e.toLowerCase() : null,
            ce[e] = s),
            o
        }
        : function(t, e, i) {
            return i ? void 0 : t[u.camelCase("default-" + e)] ? e.toLowerCase() : null
        }
    }),
    ue && pe || (u.attrHooks.value = {
        set: function(t, e, i) {
            return u.nodeName(t, "input") ? void (t.defaultValue = e) : ae && ae.set(t, e, i)
        }
    }),
    pe || (ae = {
        set: function(t, e, i) {
            var n = t.getAttributeNode(i);
            return n || t.setAttributeNode(n = t.ownerDocument.createAttribute(i)),
            n.value = e += "",
            "value" === i || e === t.getAttribute(i) ? e : void 0
        }
    },
    ce.id = ce.name = ce.coords = function(t, e, i) {
        var n;
        return i ? void 0 : (n = t.getAttributeNode(e)) && "" !== n.value ? n.value : null
    }
    ,
    u.valHooks.button = {
        get: function(t, e) {
            var i = t.getAttributeNode(e);
            return i && i.specified ? i.value : void 0
        },
        set: ae.set
    },
    u.attrHooks.contenteditable = {
        set: function(t, e, i) {
            ae.set(t, "" !== e && e, i)
        }
    },
    u.each(["width", "height"], function(t, e) {
        u.attrHooks[e] = {
            set: function(t, i) {
                return "" === i ? (t.setAttribute(e, "auto"),
                i) : void 0
            }
        }
    })),
    d.style || (u.attrHooks.style = {
        get: function(t) {
            return t.style.cssText || void 0
        },
        set: function(t, e) {
            return t.style.cssText = e + ""
        }
    });
    var he = /^(?:input|select|textarea|button|object)$/i
      , fe = /^(?:a|area)$/i;
    u.fn.extend({
        prop: function(t, e) {
            return U(this, u.prop, t, e, arguments.length > 1)
        },
        removeProp: function(t) {
            return t = u.propFix[t] || t,
            this.each(function() {
                try {
                    this[t] = void 0,
                    delete this[t]
                } catch (t) {}
            })
        }
    }),
    u.extend({
        propFix: {
            for: "htmlFor",
            class: "className"
        },
        prop: function(t, e, i) {
            var n, o, s = t.nodeType;
            if (t && 3 !== s && 8 !== s && 2 !== s)
                return (1 !== s || !u.isXMLDoc(t)) && (e = u.propFix[e] || e,
                o = u.propHooks[e]),
                void 0 !== i ? o && "set"in o && void 0 !== (n = o.set(t, i, e)) ? n : t[e] = i : o && "get"in o && null !== (n = o.get(t, e)) ? n : t[e]
        },
        propHooks: {
            tabIndex: {
                get: function(t) {
                    var e = u.find.attr(t, "tabindex");
                    return e ? parseInt(e, 10) : he.test(t.nodeName) || fe.test(t.nodeName) && t.href ? 0 : -1
                }
            }
        }
    }),
    d.hrefNormalized || u.each(["href", "src"], function(t, e) {
        u.propHooks[e] = {
            get: function(t) {
                return t.getAttribute(e, 4)
            }
        }
    }),
    d.optSelected || (u.propHooks.selected = {
        get: function(t) {
            var e = t.parentNode;
            return e && (e.selectedIndex,
            e.parentNode && e.parentNode.selectedIndex),
            null
        }
    }),
    u.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
        u.propFix[this.toLowerCase()] = this
    }),
    d.enctype || (u.propFix.enctype = "encoding");
    var me = /[\t\r\n\f]/g;
    u.fn.extend({
        addClass: function(t) {
            var e, i, n, o, s, r, a = 0, l = this.length, c = "string" == typeof t && t;
            if (u.isFunction(t))
                return this.each(function(e) {
                    u(this).addClass(t.call(this, e, this.className))
                });
            if (c)
                for (e = (t || "").match(_) || []; l > a; a++)
                    if (n = 1 === (i = this[a]).nodeType && (i.className ? (" " + i.className + " ").replace(me, " ") : " ")) {
                        for (s = 0; o = e[s++]; )
                            n.indexOf(" " + o + " ") < 0 && (n += o + " ");
                        r = u.trim(n),
                        i.className !== r && (i.className = r)
                    }
            return this
        },
        removeClass: function(t) {
            var e, i, n, o, s, r, a = 0, l = this.length, c = 0 === arguments.length || "string" == typeof t && t;
            if (u.isFunction(t))
                return this.each(function(e) {
                    u(this).removeClass(t.call(this, e, this.className))
                });
            if (c)
                for (e = (t || "").match(_) || []; l > a; a++)
                    if (n = 1 === (i = this[a]).nodeType && (i.className ? (" " + i.className + " ").replace(me, " ") : "")) {
                        for (s = 0; o = e[s++]; )
                            for (; n.indexOf(" " + o + " ") >= 0; )
                                n = n.replace(" " + o + " ", " ");
                        r = t ? u.trim(n) : "",
                        i.className !== r && (i.className = r)
                    }
            return this
        },
        toggleClass: function(t, e) {
            var i = typeof t;
            return "boolean" == typeof e && "string" === i ? e ? this.addClass(t) : this.removeClass(t) : this.each(u.isFunction(t) ? function(i) {
                u(this).toggleClass(t.call(this, i, this.className, e), e)
            }
            : function() {
                if ("string" === i)
                    for (var e, n = 0, o = u(this), s = t.match(_) || []; e = s[n++]; )
                        o.hasClass(e) ? o.removeClass(e) : o.addClass(e);
                else
                    (i === j || "boolean" === i) && (this.className && u._data(this, "__className__", this.className),
                    this.className = this.className || !1 === t ? "" : u._data(this, "__className__") || "")
            }
            )
        },
        hasClass: function(t) {
            for (var e = " " + t + " ", i = 0, n = this.length; n > i; i++)
                if (1 === this[i].nodeType && (" " + this[i].className + " ").replace(me, " ").indexOf(e) >= 0)
                    return !0;
            return !1
        }
    }),
    u.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(t, e) {
        u.fn[e] = function(t, i) {
            return arguments.length > 0 ? this.on(e, null, t, i) : this.trigger(e)
        }
    }),
    u.fn.extend({
        hover: function(t, e) {
            return this.mouseenter(t).mouseleave(e || t)
        },
        bind: function(t, e, i) {
            return this.on(t, null, e, i)
        },
        unbind: function(t, e) {
            return this.off(t, null, e)
        },
        delegate: function(t, e, i, n) {
            return this.on(e, t, i, n)
        },
        undelegate: function(t, e, i) {
            return 1 === arguments.length ? this.off(t, "**") : this.off(e, t || "**", i)
        }
    });
    var ge = u.now()
      , ve = /\?/
      , ye = /(,)|(\[|{)|(}|])|"(?:[^"\\\r\n]|\\["\\\/bfnrt]|\\u[\da-fA-F]{4})*"\s*:?|true|false|null|-?(?!0\d)\d+(?:\.\d+|)(?:[eE][+-]?\d+|)/g;
    u.parseJSON = function(e) {
        if (t.JSON && t.JSON.parse)
            return t.JSON.parse(e + "");
        var i, n = null, o = u.trim(e + "");
        return o && !u.trim(o.replace(ye, function(t, e, o, s) {
            return i && e && (n = 0),
            0 === n ? t : (i = o || e,
            n += !s - !o,
            "")
        })) ? Function("return " + o)() : u.error("Invalid JSON: " + e)
    }
    ,
    u.parseXML = function(e) {
        var i;
        if (!e || "string" != typeof e)
            return null;
        try {
            t.DOMParser ? i = (new DOMParser).parseFromString(e, "text/xml") : ((i = new ActiveXObject("Microsoft.XMLDOM")).async = "false",
            i.loadXML(e))
        } catch (t) {
            i = void 0
        }
        return i && i.documentElement && !i.getElementsByTagName("parsererror").length || u.error("Invalid XML: " + e),
        i
    }
    ;
    var be, we, xe = /#.*$/, Te = /([?&])_=[^&]*/, ke = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm, Ce = /^(?:GET|HEAD)$/, Se = /^\/\//, $e = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/, Ee = {}, Ie = {}, Ae = "*/".concat("*");
    try {
        we = location.href
    } catch (t) {
        (we = C.createElement("a")).href = "",
        we = we.href
    }
    function _e(t) {
        return function(e, i) {
            "string" != typeof e && (i = e,
            e = "*");
            var n, o = 0, s = e.toLowerCase().match(_) || [];
            if (u.isFunction(i))
                for (; n = s[o++]; )
                    "+" === n.charAt(0) ? (n = n.slice(1) || "*",
                    (t[n] = t[n] || []).unshift(i)) : (t[n] = t[n] || []).push(i)
        }
    }
    function Ne(t, e, i, n) {
        var o = {}
          , s = t === Ie;
        function r(a) {
            var l;
            return o[a] = !0,
            u.each(t[a] || [], function(t, a) {
                var c = a(e, i, n);
                return "string" != typeof c || s || o[c] ? s ? !(l = c) : void 0 : (e.dataTypes.unshift(c),
                r(c),
                !1)
            }),
            l
        }
        return r(e.dataTypes[0]) || !o["*"] && r("*")
    }
    function Pe(t, e) {
        var i, n, o = u.ajaxSettings.flatOptions || {};
        for (n in e)
            void 0 !== e[n] && ((o[n] ? t : i || (i = {}))[n] = e[n]);
        return i && u.extend(!0, t, i),
        t
    }
    be = $e.exec(we.toLowerCase()) || [],
    u.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: we,
            type: "GET",
            isLocal: /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(be[1]),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": Ae,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {
                xml: /xml/,
                html: /html/,
                json: /json/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText",
                json: "responseJSON"
            },
            converters: {
                "* text": String,
                "text html": !0,
                "text json": u.parseJSON,
                "text xml": u.parseXML
            },
            flatOptions: {
                url: !0,
                context: !0
            }
        },
        ajaxSetup: function(t, e) {
            return e ? Pe(Pe(t, u.ajaxSettings), e) : Pe(u.ajaxSettings, t)
        },
        ajaxPrefilter: _e(Ee),
        ajaxTransport: _e(Ie),
        ajax: function(t, e) {
            "object" == typeof t && (e = t,
            t = void 0),
            e = e || {};
            var i, n, o, s, r, a, l, c, d = u.ajaxSetup({}, e), p = d.context || d, h = d.context && (p.nodeType || p.jquery) ? u(p) : u.event, f = u.Deferred(), m = u.Callbacks("once memory"), g = d.statusCode || {}, v = {}, y = {}, b = 0, w = "canceled", x = {
                readyState: 0,
                getResponseHeader: function(t) {
                    var e;
                    if (2 === b) {
                        if (!c)
                            for (c = {}; e = ke.exec(s); )
                                c[e[1].toLowerCase()] = e[2];
                        e = c[t.toLowerCase()]
                    }
                    return null == e ? null : e
                },
                getAllResponseHeaders: function() {
                    return 2 === b ? s : null
                },
                setRequestHeader: function(t, e) {
                    var i = t.toLowerCase();
                    return b || (t = y[i] = y[i] || t,
                    v[t] = e),
                    this
                },
                overrideMimeType: function(t) {
                    return b || (d.mimeType = t),
                    this
                },
                statusCode: function(t) {
                    var e;
                    if (t)
                        if (2 > b)
                            for (e in t)
                                g[e] = [g[e], t[e]];
                        else
                            x.always(t[x.status]);
                    return this
                },
                abort: function(t) {
                    var e = t || w;
                    return l && l.abort(e),
                    T(0, e),
                    this
                }
            };
            if (f.promise(x).complete = m.add,
            x.success = x.done,
            x.error = x.fail,
            d.url = ((t || d.url || we) + "").replace(xe, "").replace(Se, be[1] + "//"),
            d.type = e.method || e.type || d.method || d.type,
            d.dataTypes = u.trim(d.dataType || "*").toLowerCase().match(_) || [""],
            null == d.crossDomain && (i = $e.exec(d.url.toLowerCase()),
            d.crossDomain = !(!i || i[1] === be[1] && i[2] === be[2] && (i[3] || ("http:" === i[1] ? "80" : "443")) === (be[3] || ("http:" === be[1] ? "80" : "443")))),
            d.data && d.processData && "string" != typeof d.data && (d.data = u.param(d.data, d.traditional)),
            Ne(Ee, d, e, x),
            2 === b)
                return x;
            for (n in (a = d.global) && 0 == u.active++ && u.event.trigger("ajaxStart"),
            d.type = d.type.toUpperCase(),
            d.hasContent = !Ce.test(d.type),
            o = d.url,
            d.hasContent || (d.data && (o = d.url += (ve.test(o) ? "&" : "?") + d.data,
            delete d.data),
            !1 === d.cache && (d.url = Te.test(o) ? o.replace(Te, "$1_=" + ge++) : o + (ve.test(o) ? "&" : "?") + "_=" + ge++)),
            d.ifModified && (u.lastModified[o] && x.setRequestHeader("If-Modified-Since", u.lastModified[o]),
            u.etag[o] && x.setRequestHeader("If-None-Match", u.etag[o])),
            (d.data && d.hasContent && !1 !== d.contentType || e.contentType) && x.setRequestHeader("Content-Type", d.contentType),
            x.setRequestHeader("Accept", d.dataTypes[0] && d.accepts[d.dataTypes[0]] ? d.accepts[d.dataTypes[0]] + ("*" !== d.dataTypes[0] ? ", " + Ae + "; q=0.01" : "") : d.accepts["*"]),
            d.headers)
                x.setRequestHeader(n, d.headers[n]);
            if (d.beforeSend && (!1 === d.beforeSend.call(p, x, d) || 2 === b))
                return x.abort();
            for (n in w = "abort",
            {
                success: 1,
                error: 1,
                complete: 1
            })
                x[n](d[n]);
            if (l = Ne(Ie, d, e, x)) {
                x.readyState = 1,
                a && h.trigger("ajaxSend", [x, d]),
                d.async && d.timeout > 0 && (r = setTimeout(function() {
                    x.abort("timeout")
                }, d.timeout));
                try {
                    b = 1,
                    l.send(v, T)
                } catch (t) {
                    if (!(2 > b))
                        throw t;
                    T(-1, t)
                }
            } else
                T(-1, "No Transport");
            function T(t, e, i, n) {
                var c, v, y, w, T, k = e;
                2 !== b && (b = 2,
                r && clearTimeout(r),
                l = void 0,
                s = n || "",
                x.readyState = t > 0 ? 4 : 0,
                c = t >= 200 && 300 > t || 304 === t,
                i && (w = function(t, e, i) {
                    for (var n, o, s, r, a = t.contents, l = t.dataTypes; "*" === l[0]; )
                        l.shift(),
                        void 0 === o && (o = t.mimeType || e.getResponseHeader("Content-Type"));
                    if (o)
                        for (r in a)
                            if (a[r] && a[r].test(o)) {
                                l.unshift(r);
                                break
                            }
                    if (l[0]in i)
                        s = l[0];
                    else {
                        for (r in i) {
                            if (!l[0] || t.converters[r + " " + l[0]]) {
                                s = r;
                                break
                            }
                            n || (n = r)
                        }
                        s = s || n
                    }
                    return s ? (s !== l[0] && l.unshift(s),
                    i[s]) : void 0
                }(d, x, i)),
                w = function(t, e, i, n) {
                    var o, s, r, a, l, c = {}, d = t.dataTypes.slice();
                    if (d[1])
                        for (r in t.converters)
                            c[r.toLowerCase()] = t.converters[r];
                    for (s = d.shift(); s; )
                        if (t.responseFields[s] && (i[t.responseFields[s]] = e),
                        !l && n && t.dataFilter && (e = t.dataFilter(e, t.dataType)),
                        l = s,
                        s = d.shift())
                            if ("*" === s)
                                s = l;
                            else if ("*" !== l && l !== s) {
                                if (!(r = c[l + " " + s] || c["* " + s]))
                                    for (o in c)
                                        if ((a = o.split(" "))[1] === s && (r = c[l + " " + a[0]] || c["* " + a[0]])) {
                                            !0 === r ? r = c[o] : !0 !== c[o] && (s = a[0],
                                            d.unshift(a[1]));
                                            break
                                        }
                                if (!0 !== r)
                                    if (r && t.throws)
                                        e = r(e);
                                    else
                                        try {
                                            e = r(e)
                                        } catch (t) {
                                            return {
                                                state: "parsererror",
                                                error: r ? t : "No conversion from " + l + " to " + s
                                            }
                                        }
                            }
                    return {
                        state: "success",
                        data: e
                    }
                }(d, w, x, c),
                c ? (d.ifModified && ((T = x.getResponseHeader("Last-Modified")) && (u.lastModified[o] = T),
                (T = x.getResponseHeader("etag")) && (u.etag[o] = T)),
                204 === t || "HEAD" === d.type ? k = "nocontent" : 304 === t ? k = "notmodified" : (k = w.state,
                v = w.data,
                c = !(y = w.error))) : (y = k,
                (t || !k) && (k = "error",
                0 > t && (t = 0))),
                x.status = t,
                x.statusText = (e || k) + "",
                c ? f.resolveWith(p, [v, k, x]) : f.rejectWith(p, [x, k, y]),
                x.statusCode(g),
                g = void 0,
                a && h.trigger(c ? "ajaxSuccess" : "ajaxError", [x, d, c ? v : y]),
                m.fireWith(p, [x, k]),
                a && (h.trigger("ajaxComplete", [x, d]),
                --u.active || u.event.trigger("ajaxStop")))
            }
            return x
        },
        getJSON: function(t, e, i) {
            return u.get(t, e, i, "json")
        },
        getScript: function(t, e) {
            return u.get(t, void 0, e, "script")
        }
    }),
    u.each(["get", "post"], function(t, e) {
        u[e] = function(t, i, n, o) {
            return u.isFunction(i) && (o = o || n,
            n = i,
            i = void 0),
            u.ajax({
                url: t,
                type: e,
                dataType: o,
                data: i,
                success: n
            })
        }
    }),
    u.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(t, e) {
        u.fn[e] = function(t) {
            return this.on(e, t)
        }
    }),
    u._evalUrl = function(t) {
        return u.ajax({
            url: t,
            type: "GET",
            dataType: "script",
            async: !1,
            global: !1,
            throws: !0
        })
    }
    ,
    u.fn.extend({
        wrapAll: function(t) {
            if (u.isFunction(t))
                return this.each(function(e) {
                    u(this).wrapAll(t.call(this, e))
                });
            if (this[0]) {
                var e = u(t, this[0].ownerDocument).eq(0).clone(!0);
                this[0].parentNode && e.insertBefore(this[0]),
                e.map(function() {
                    for (var t = this; t.firstChild && 1 === t.firstChild.nodeType; )
                        t = t.firstChild;
                    return t
                }).append(this)
            }
            return this
        },
        wrapInner: function(t) {
            return this.each(u.isFunction(t) ? function(e) {
                u(this).wrapInner(t.call(this, e))
            }
            : function() {
                var e = u(this)
                  , i = e.contents();
                i.length ? i.wrapAll(t) : e.append(t)
            }
            )
        },
        wrap: function(t) {
            var e = u.isFunction(t);
            return this.each(function(i) {
                u(this).wrapAll(e ? t.call(this, i) : t)
            })
        },
        unwrap: function() {
            return this.parent().each(function() {
                u.nodeName(this, "body") || u(this).replaceWith(this.childNodes)
            }).end()
        }
    }),
    u.expr.filters.hidden = function(t) {
        return t.offsetWidth <= 0 && t.offsetHeight <= 0 || !d.reliableHiddenOffsets() && "none" === (t.style && t.style.display || u.css(t, "display"))
    }
    ,
    u.expr.filters.visible = function(t) {
        return !u.expr.filters.hidden(t)
    }
    ;
    var De = /%20/g
      , Oe = /\[\]$/
      , je = /\r?\n/g
      , Le = /^(?:submit|button|image|reset|file)$/i
      , He = /^(?:input|select|textarea|keygen)/i;
    function Me(t, e, i, n) {
        var o;
        if (u.isArray(e))
            u.each(e, function(e, o) {
                i || Oe.test(t) ? n(t, o) : Me(t + "[" + ("object" == typeof o ? e : "") + "]", o, i, n)
            });
        else if (i || "object" !== u.type(e))
            n(t, e);
        else
            for (o in e)
                Me(t + "[" + o + "]", e[o], i, n)
    }
    u.param = function(t, e) {
        var i, n = [], o = function(t, e) {
            e = u.isFunction(e) ? e() : null == e ? "" : e,
            n[n.length] = encodeURIComponent(t) + "=" + encodeURIComponent(e)
        };
        if (void 0 === e && (e = u.ajaxSettings && u.ajaxSettings.traditional),
        u.isArray(t) || t.jquery && !u.isPlainObject(t))
            u.each(t, function() {
                o(this.name, this.value)
            });
        else
            for (i in t)
                Me(i, t[i], e, o);
        return n.join("&").replace(De, "+")
    }
    ,
    u.fn.extend({
        serialize: function() {
            return u.param(this.serializeArray())
        },
        serializeArray: function() {
            return this.map(function() {
                var t = u.prop(this, "elements");
                return t ? u.makeArray(t) : this
            }).filter(function() {
                var t = this.type;
                return this.name && !u(this).is(":disabled") && He.test(this.nodeName) && !Le.test(t) && (this.checked || !X.test(t))
            }).map(function(t, e) {
                var i = u(this).val();
                return null == i ? null : u.isArray(i) ? u.map(i, function(t) {
                    return {
                        name: e.name,
                        value: t.replace(je, "\r\n")
                    }
                }) : {
                    name: e.name,
                    value: i.replace(je, "\r\n")
                }
            }).get()
        }
    }),
    u.ajaxSettings.xhr = void 0 !== t.ActiveXObject ? function() {
        return !this.isLocal && /^(get|post|head|put|delete|options)$/i.test(this.type) && Fe() || function() {
            try {
                return new t.ActiveXObject("Microsoft.XMLHTTP")
            } catch (t) {}
        }()
    }
    : Fe;
    var ze = 0
      , We = {}
      , Re = u.ajaxSettings.xhr();
    function Fe() {
        try {
            return new t.XMLHttpRequest
        } catch (t) {}
    }
    t.ActiveXObject && u(t).on("unload", function() {
        for (var t in We)
            We[t](void 0, !0)
    }),
    d.cors = !!Re && "withCredentials"in Re,
    (Re = d.ajax = !!Re) && u.ajaxTransport(function(t) {
        var e;
        if (!t.crossDomain || d.cors)
            return {
                send: function(i, n) {
                    var o, s = t.xhr(), r = ++ze;
                    if (s.open(t.type, t.url, t.async, t.username, t.password),
                    t.xhrFields)
                        for (o in t.xhrFields)
                            s[o] = t.xhrFields[o];
                    for (o in t.mimeType && s.overrideMimeType && s.overrideMimeType(t.mimeType),
                    t.crossDomain || i["X-Requested-With"] || (i["X-Requested-With"] = "XMLHttpRequest"),
                    i)
                        void 0 !== i[o] && s.setRequestHeader(o, i[o] + "");
                    s.send(t.hasContent && t.data || null),
                    e = function(i, o) {
                        var a, l, c;
                        if (e && (o || 4 === s.readyState))
                            if (delete We[r],
                            e = void 0,
                            s.onreadystatechange = u.noop,
                            o)
                                4 !== s.readyState && s.abort();
                            else {
                                c = {},
                                a = s.status,
                                "string" == typeof s.responseText && (c.text = s.responseText);
                                try {
                                    l = s.statusText
                                } catch (t) {
                                    l = ""
                                }
                                a || !t.isLocal || t.crossDomain ? 1223 === a && (a = 204) : a = c.text ? 200 : 404
                            }
                        c && n(a, l, c, s.getAllResponseHeaders())
                    }
                    ,
                    t.async ? 4 === s.readyState ? setTimeout(e) : s.onreadystatechange = We[r] = e : e()
                },
                abort: function() {
                    e && e(void 0, !0)
                }
            }
    }),
    u.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /(?:java|ecma)script/
        },
        converters: {
            "text script": function(t) {
                return u.globalEval(t),
                t
            }
        }
    }),
    u.ajaxPrefilter("script", function(t) {
        void 0 === t.cache && (t.cache = !1),
        t.crossDomain && (t.type = "GET",
        t.global = !1)
    }),
    u.ajaxTransport("script", function(t) {
        if (t.crossDomain) {
            var e, i = C.head || u("head")[0] || C.documentElement;
            return {
                send: function(n, o) {
                    (e = C.createElement("script")).async = !0,
                    t.scriptCharset && (e.charset = t.scriptCharset),
                    e.src = t.url,
                    e.onload = e.onreadystatechange = function(t, i) {
                        (i || !e.readyState || /loaded|complete/.test(e.readyState)) && (e.onload = e.onreadystatechange = null,
                        e.parentNode && e.parentNode.removeChild(e),
                        e = null,
                        i || o(200, "success"))
                    }
                    ,
                    i.insertBefore(e, i.firstChild)
                },
                abort: function() {
                    e && e.onload(void 0, !0)
                }
            }
        }
    });
    var Be = []
      , qe = /(=)\?(?=&|$)|\?\?/;
    u.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function() {
            var t = Be.pop() || u.expando + "_" + ge++;
            return this[t] = !0,
            t
        }
    }),
    u.ajaxPrefilter("json jsonp", function(e, i, n) {
        var o, s, r, a = !1 !== e.jsonp && (qe.test(e.url) ? "url" : "string" == typeof e.data && !(e.contentType || "").indexOf("application/x-www-form-urlencoded") && qe.test(e.data) && "data");
        return a || "jsonp" === e.dataTypes[0] ? (o = e.jsonpCallback = u.isFunction(e.jsonpCallback) ? e.jsonpCallback() : e.jsonpCallback,
        a ? e[a] = e[a].replace(qe, "$1" + o) : !1 !== e.jsonp && (e.url += (ve.test(e.url) ? "&" : "?") + e.jsonp + "=" + o),
        e.converters["script json"] = function() {
            return r || u.error(o + " was not called"),
            r[0]
        }
        ,
        e.dataTypes[0] = "json",
        s = t[o],
        t[o] = function() {
            r = arguments
        }
        ,
        n.always(function() {
            t[o] = s,
            e[o] && (e.jsonpCallback = i.jsonpCallback,
            Be.push(o)),
            r && u.isFunction(s) && s(r[0]),
            r = s = void 0
        }),
        "script") : void 0
    }),
    u.parseHTML = function(t, e, i) {
        if (!t || "string" != typeof t)
            return null;
        "boolean" == typeof e && (i = e,
        e = !1),
        e = e || C;
        var n = w.exec(t)
          , o = !i && [];
        return n ? [e.createElement(n[1])] : (n = u.buildFragment([t], e, o),
        o && o.length && u(o).remove(),
        u.merge([], n.childNodes))
    }
    ;
    var Ue = u.fn.load;
    u.fn.load = function(t, e, i) {
        if ("string" != typeof t && Ue)
            return Ue.apply(this, arguments);
        var n, o, s, r = this, a = t.indexOf(" ");
        return a >= 0 && (n = u.trim(t.slice(a, t.length)),
        t = t.slice(0, a)),
        u.isFunction(e) ? (i = e,
        e = void 0) : e && "object" == typeof e && (s = "POST"),
        r.length > 0 && u.ajax({
            url: t,
            type: s,
            dataType: "html",
            data: e
        }).done(function(t) {
            o = arguments,
            r.html(n ? u("<div>").append(u.parseHTML(t)).find(n) : t)
        }).complete(i && function(t, e) {
            r.each(i, o || [t.responseText, e, t])
        }
        ),
        this
    }
    ,
    u.expr.filters.animated = function(t) {
        return u.grep(u.timers, function(e) {
            return t === e.elem
        }).length
    }
    ;
    var Xe = t.document.documentElement;
    function Ve(t) {
        return u.isWindow(t) ? t : 9 === t.nodeType && (t.defaultView || t.parentWindow)
    }
    u.offset = {
        setOffset: function(t, e, i) {
            var n, o, s, r, a, l, c = u.css(t, "position"), d = u(t), p = {};
            "static" === c && (t.style.position = "relative"),
            a = d.offset(),
            s = u.css(t, "top"),
            l = u.css(t, "left"),
            ("absolute" === c || "fixed" === c) && u.inArray("auto", [s, l]) > -1 ? (r = (n = d.position()).top,
            o = n.left) : (r = parseFloat(s) || 0,
            o = parseFloat(l) || 0),
            u.isFunction(e) && (e = e.call(t, i, a)),
            null != e.top && (p.top = e.top - a.top + r),
            null != e.left && (p.left = e.left - a.left + o),
            "using"in e ? e.using.call(t, p) : d.css(p)
        }
    },
    u.fn.extend({
        offset: function(t) {
            if (arguments.length)
                return void 0 === t ? this : this.each(function(e) {
                    u.offset.setOffset(this, t, e)
                });
            var e, i, n = {
                top: 0,
                left: 0
            }, o = this[0], s = o && o.ownerDocument;
            return s ? (e = s.documentElement,
            u.contains(e, o) ? (typeof o.getBoundingClientRect !== j && (n = o.getBoundingClientRect()),
            i = Ve(s),
            {
                top: n.top + (i.pageYOffset || e.scrollTop) - (e.clientTop || 0),
                left: n.left + (i.pageXOffset || e.scrollLeft) - (e.clientLeft || 0)
            }) : n) : void 0
        },
        position: function() {
            if (this[0]) {
                var t, e, i = {
                    top: 0,
                    left: 0
                }, n = this[0];
                return "fixed" === u.css(n, "position") ? e = n.getBoundingClientRect() : (t = this.offsetParent(),
                e = this.offset(),
                u.nodeName(t[0], "html") || (i = t.offset()),
                i.top += u.css(t[0], "borderTopWidth", !0),
                i.left += u.css(t[0], "borderLeftWidth", !0)),
                {
                    top: e.top - i.top - u.css(n, "marginTop", !0),
                    left: e.left - i.left - u.css(n, "marginLeft", !0)
                }
            }
        },
        offsetParent: function() {
            return this.map(function() {
                for (var t = this.offsetParent || Xe; t && !u.nodeName(t, "html") && "static" === u.css(t, "position"); )
                    t = t.offsetParent;
                return t || Xe
            })
        }
    }),
    u.each({
        scrollLeft: "pageXOffset",
        scrollTop: "pageYOffset"
    }, function(t, e) {
        var i = /Y/.test(e);
        u.fn[t] = function(n) {
            return U(this, function(t, n, o) {
                var s = Ve(t);
                return void 0 === o ? s ? e in s ? s[e] : s.document.documentElement[n] : t[n] : void (s ? s.scrollTo(i ? u(s).scrollLeft() : o, i ? o : u(s).scrollTop()) : t[n] = o)
            }, t, n, arguments.length, null)
        }
    }),
    u.each(["top", "left"], function(t, e) {
        u.cssHooks[e] = Ot(d.pixelPosition, function(t, i) {
            return i ? (i = _t(t, e),
            Pt.test(i) ? u(t).position()[e] + "px" : i) : void 0
        })
    }),
    u.each({
        Height: "height",
        Width: "width"
    }, function(t, e) {
        u.each({
            padding: "inner" + t,
            content: e,
            "": "outer" + t
        }, function(i, n) {
            u.fn[n] = function(n, o) {
                var s = arguments.length && (i || "boolean" != typeof n)
                  , r = i || (!0 === n || !0 === o ? "margin" : "border");
                return U(this, function(e, i, n) {
                    var o;
                    return u.isWindow(e) ? e.document.documentElement["client" + t] : 9 === e.nodeType ? (o = e.documentElement,
                    Math.max(e.body["scroll" + t], o["scroll" + t], e.body["offset" + t], o["offset" + t], o["client" + t])) : void 0 === n ? u.css(e, i, r) : u.style(e, i, n, r)
                }, e, s ? n : void 0, s, null)
            }
        })
    }),
    u.fn.size = function() {
        return this.length
    }
    ,
    u.fn.andSelf = u.fn.addBack,
    "function" == typeof define && define.amd && define("jquery", [], function() {
        return u
    });
    var Ye = t.jQuery
      , Qe = t.$;
    return u.noConflict = function(e) {
        return t.$ === u && (t.$ = Qe),
        e && t.jQuery === u && (t.jQuery = Ye),
        u
    }
    ,
    typeof e === j && (t.jQuery = t.$ = u),
    u
}),
"undefined" == typeof jQuery)
    throw new Error("Bootstrap's JavaScript requires jQuery");
function ssc_init() {
    if (document.body) {
        var t = document.body
          , e = document.documentElement
          , i = window.innerHeight
          , n = t.scrollHeight;
        if (ssc_root = document.compatMode.indexOf("CSS") >= 0 ? e : t,
        ssc_activeElement = t,
        ssc_initdone = !0,
        top != self)
            ssc_frame = !0;
        else if (n > i && (t.offsetHeight <= i || e.offsetHeight <= i) && (ssc_root.style.height = "auto",
        ssc_root.offsetHeight <= i)) {
            var o = document.createElement("div");
            o.style.clear = "both",
            t.appendChild(o)
        }
        ssc_fixedback || (t.style.backgroundAttachment = "scroll",
        e.style.backgroundAttachment = "scroll"),
        ssc_keyboardsupport && ssc_addEvent("keydown", ssc_keydown)
    }
}
function ssc_scrollArray(t, e, i, n) {
    if (n || (n = 1e3),
    ssc_directionCheck(e, i),
    ssc_que.push({
        x: e,
        y: i,
        lastX: e < 0 ? .99 : -.99,
        lastY: i < 0 ? .99 : -.99,
        start: +new Date
    }),
    !ssc_pending) {
        var o = function() {
            for (var s = +new Date, r = 0, a = 0, l = 0; l < ssc_que.length; l++) {
                var c = ssc_que[l]
                  , d = s - c.start
                  , p = d >= ssc_animtime
                  , u = p ? 1 : d / ssc_animtime;
                ssc_pulseAlgorithm && (u = ssc_pulse(u));
                var h = c.x * u - c.lastX >> 0
                  , f = c.y * u - c.lastY >> 0;
                r += h,
                a += f,
                c.lastX += h,
                c.lastY += f,
                p && (ssc_que.splice(l, 1),
                l--)
            }
            if (e) {
                var m = t.scrollLeft;
                t.scrollLeft += r,
                r && t.scrollLeft === m && (e = 0)
            }
            if (i) {
                var g = t.scrollTop;
                t.scrollTop += a,
                a && t.scrollTop === g && (i = 0)
            }
            e || i || (ssc_que = []),
            ssc_que.length ? setTimeout(o, n / ssc_framerate + 1) : ssc_pending = !1
        };
        setTimeout(o, 0),
        ssc_pending = !0
    }
}
function ssc_wheel(t) {
    ssc_initdone || ssc_init();
    var e = t.target
      , i = ssc_overflowingAncestor(e);
    if (!i || t.defaultPrevented || ssc_isNodeName(ssc_activeElement, "embed") || ssc_isNodeName(e, "embed") && /\.pdf/i.test(e.src))
        return !0;
    var n = t.wheelDeltaX || 0
      , o = t.wheelDeltaY || 0;
    n || o || (o = t.wheelDelta || 0),
    Math.abs(n) > 1.2 && (n *= ssc_stepsize / 120),
    Math.abs(o) > 1.2 && (o *= ssc_stepsize / 120),
    ssc_scrollArray(i, -n, -o),
    t.preventDefault()
}
function ssc_keydown(t) {
    var e = t.target
      , i = t.ctrlKey || t.altKey || t.metaKey;
    if (/input|textarea|embed/i.test(e.nodeName) || e.isContentEditable || t.defaultPrevented || i)
        return !0;
    if (ssc_isNodeName(e, "button") && t.keyCode === ssc_key.spacebar)
        return !0;
    var n = 0
      , o = 0
      , s = ssc_overflowingAncestor(ssc_activeElement)
      , r = s.clientHeight;
    switch (s == document.body && (r = window.innerHeight),
    t.keyCode) {
    case ssc_key.up:
        o = -ssc_arrowscroll;
        break;
    case ssc_key.down:
        o = ssc_arrowscroll;
        break;
    case ssc_key.spacebar:
        o = -(t.shiftKey ? 1 : -1) * r * .9;
        break;
    case ssc_key.pageup:
        o = .9 * -r;
        break;
    case ssc_key.pagedown:
        o = .9 * r;
        break;
    case ssc_key.home:
        o = -s.scrollTop;
        break;
    case ssc_key.end:
        var a = s.scrollHeight - s.scrollTop - r;
        o = a > 0 ? a + 10 : 0;
        break;
    case ssc_key.left:
        n = -ssc_arrowscroll;
        break;
    case ssc_key.right:
        n = ssc_arrowscroll;
        break;
    default:
        return !0
    }
    ssc_scrollArray(s, n, o),
    t.preventDefault()
}
function ssc_mousedown(t) {
    ssc_activeElement = t.target
}
function ssc_setCache(t, e) {
    for (var i = t.length; i--; )
        ssc_cache[ssc_uniqueID(t[i])] = e;
    return e
}
function ssc_overflowingAncestor(t) {
    var e = []
      , i = ssc_root.scrollHeight;
    do {
        var n = ssc_cache[ssc_uniqueID(t)];
        if (n)
            return ssc_setCache(e, n);
        if (e.push(t),
        i === t.scrollHeight) {
            if (!ssc_frame || ssc_root.clientHeight + 10 < i)
                return ssc_setCache(e, document.body)
        } else if (t.clientHeight + 10 < t.scrollHeight && (overflow = getComputedStyle(t, "").getPropertyValue("overflow"),
        "scroll" === overflow || "auto" === overflow))
            return ssc_setCache(e, t)
    } while (t = t.parentNode)
}
function ssc_addEvent(t, e, i) {
    window.addEventListener(t, e, i || !1)
}
function ssc_removeEvent(t, e, i) {
    window.removeEventListener(t, e, i || !1)
}
function ssc_isNodeName(t, e) {
    return t.nodeName.toLowerCase() === e.toLowerCase()
}
function ssc_directionCheck(t, e) {
    t = t > 0 ? 1 : -1,
    e = e > 0 ? 1 : -1,
    ssc_direction.x === t && ssc_direction.y === e || (ssc_direction.x = t,
    ssc_direction.y = e,
    ssc_que = [])
}
function ssc_pulse_(t) {
    var e, i;
    return (t *= ssc_pulseScale) < 1 ? e = t - (1 - Math.exp(-t)) : (t -= 1,
    e = (i = Math.exp(-1)) + (1 - Math.exp(-t)) * (1 - i)),
    e * ssc_pulseNormalize
}
function ssc_pulse(t) {
    return t >= 1 ? 1 : t <= 0 ? 0 : (1 == ssc_pulseNormalize && (ssc_pulseNormalize /= ssc_pulse_(1)),
    ssc_pulse_(t))
}
!function(t) {
    "use strict";
    var e = jQuery.fn.jquery.split(" ")[0].split(".");
    if (e[0] < 2 && e[1] < 9 || 1 == e[0] && 9 == e[1] && e[2] < 1)
        throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher")
}(),
function(t) {
    "use strict";
    t.fn.emulateTransitionEnd = function(e) {
        var i = !1
          , n = this;
        t(this).one("bsTransitionEnd", function() {
            i = !0
        });
        return setTimeout(function() {
            i || t(n).trigger(t.support.transition.end)
        }, e),
        this
    }
    ,
    t(function() {
        t.support.transition = function() {
            var t = document.createElement("bootstrap")
              , e = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "oTransitionEnd otransitionend",
                transition: "transitionend"
            };
            for (var i in e)
                if (void 0 !== t.style[i])
                    return {
                        end: e[i]
                    };
            return !1
        }(),
        t.support.transition && (t.event.special.bsTransitionEnd = {
            bindType: t.support.transition.end,
            delegateType: t.support.transition.end,
            handle: function(e) {
                return t(e.target).is(this) ? e.handleObj.handler.apply(this, arguments) : void 0
            }
        })
    })
}(jQuery),
function(t) {
    "use strict";
    var e = '[data-dismiss="alert"]'
      , i = function(i) {
        t(i).on("click", e, this.close)
    };
    i.VERSION = "3.3.4",
    i.TRANSITION_DURATION = 150,
    i.prototype.close = function(e) {
        function n() {
            r.detach().trigger("closed.bs.alert").remove()
        }
        var o = t(this)
          , s = o.attr("data-target");
        s || (s = (s = o.attr("href")) && s.replace(/.*(?=#[^\s]*$)/, ""));
        var r = t(s);
        e && e.preventDefault(),
        r.length || (r = o.closest(".alert")),
        r.trigger(e = t.Event("close.bs.alert")),
        e.isDefaultPrevented() || (r.removeClass("in"),
        t.support.transition && r.hasClass("fade") ? r.one("bsTransitionEnd", n).emulateTransitionEnd(i.TRANSITION_DURATION) : n())
    }
    ;
    var n = t.fn.alert;
    t.fn.alert = function(e) {
        return this.each(function() {
            var n = t(this)
              , o = n.data("bs.alert");
            o || n.data("bs.alert", o = new i(this)),
            "string" == typeof e && o[e].call(n)
        })
    }
    ,
    t.fn.alert.Constructor = i,
    t.fn.alert.noConflict = function() {
        return t.fn.alert = n,
        this
    }
    ,
    t(document).on("click.bs.alert.data-api", e, i.prototype.close)
}(jQuery),
function(t) {
    "use strict";
    function e(e) {
        return this.each(function() {
            var n = t(this)
              , o = n.data("bs.button")
              , s = "object" == typeof e && e;
            o || n.data("bs.button", o = new i(this,s)),
            "toggle" == e ? o.toggle() : e && o.setState(e)
        })
    }
    var i = function(e, n) {
        this.$element = t(e),
        this.options = t.extend({}, i.DEFAULTS, n),
        this.isLoading = !1
    };
    i.VERSION = "3.3.4",
    i.DEFAULTS = {
        loadingText: "loading..."
    },
    i.prototype.setState = function(e) {
        var i = "disabled"
          , n = this.$element
          , o = n.is("input") ? "val" : "html"
          , s = n.data();
        e += "Text",
        null == s.resetText && n.data("resetText", n[o]()),
        setTimeout(t.proxy(function() {
            n[o](null == s[e] ? this.options[e] : s[e]),
            "loadingText" == e ? (this.isLoading = !0,
            n.addClass(i).attr(i, i)) : this.isLoading && (this.isLoading = !1,
            n.removeClass(i).removeAttr(i))
        }, this), 0)
    }
    ,
    i.prototype.toggle = function() {
        var t = !0
          , e = this.$element.closest('[data-toggle="buttons"]');
        if (e.length) {
            var i = this.$element.find("input");
            "radio" == i.prop("type") && (i.prop("checked") && this.$element.hasClass("active") ? t = !1 : e.find(".active").removeClass("active")),
            t && i.prop("checked", !this.$element.hasClass("active")).trigger("change")
        } else
            this.$element.attr("aria-pressed", !this.$element.hasClass("active"));
        t && this.$element.toggleClass("active")
    }
    ;
    var n = t.fn.button;
    t.fn.button = e,
    t.fn.button.Constructor = i,
    t.fn.button.noConflict = function() {
        return t.fn.button = n,
        this
    }
    ,
    t(document).on("click.bs.button.data-api", '[data-toggle^="button"]', function(i) {
        var n = t(i.target);
        n.hasClass("btn") || (n = n.closest(".btn")),
        e.call(n, "toggle"),
        i.preventDefault()
    }).on("focus.bs.button.data-api blur.bs.button.data-api", '[data-toggle^="button"]', function(e) {
        t(e.target).closest(".btn").toggleClass("focus", /^focus(in)?$/.test(e.type))
    })
}(jQuery),
function(t) {
    "use strict";
    function e(e) {
        return this.each(function() {
            var n = t(this)
              , o = n.data("bs.carousel")
              , s = t.extend({}, i.DEFAULTS, n.data(), "object" == typeof e && e)
              , r = "string" == typeof e ? e : s.slide;
            o || n.data("bs.carousel", o = new i(this,s)),
            "number" == typeof e ? o.to(e) : r ? o[r]() : s.interval && o.pause().cycle()
        })
    }
    var i = function(e, i) {
        this.$element = t(e),
        this.$indicators = this.$element.find(".carousel-indicators"),
        this.options = i,
        this.paused = null,
        this.sliding = null,
        this.interval = null,
        this.$active = null,
        this.$items = null,
        this.options.keyboard && this.$element.on("keydown.bs.carousel", t.proxy(this.keydown, this)),
        "hover" == this.options.pause && !("ontouchstart"in document.documentElement) && this.$element.on("mouseenter.bs.carousel", t.proxy(this.pause, this)).on("mouseleave.bs.carousel", t.proxy(this.cycle, this))
    };
    i.VERSION = "3.3.4",
    i.TRANSITION_DURATION = 600,
    i.DEFAULTS = {
        interval: 5e3,
        pause: "hover",
        wrap: !0,
        keyboard: !0
    },
    i.prototype.keydown = function(t) {
        if (!/input|textarea/i.test(t.target.tagName)) {
            switch (t.which) {
            case 37:
                this.prev();
                break;
            case 39:
                this.next();
                break;
            default:
                return
            }
            t.preventDefault()
        }
    }
    ,
    i.prototype.cycle = function(e) {
        return e || (this.paused = !1),
        this.interval && clearInterval(this.interval),
        this.options.interval && !this.paused && (this.interval = setInterval(t.proxy(this.next, this), this.options.interval)),
        this
    }
    ,
    i.prototype.getItemIndex = function(t) {
        return this.$items = t.parent().children(".item"),
        this.$items.index(t || this.$active)
    }
    ,
    i.prototype.getItemForDirection = function(t, e) {
        var i = this.getItemIndex(e);
        if (("prev" == t && 0 === i || "next" == t && i == this.$items.length - 1) && !this.options.wrap)
            return e;
        var n = (i + ("prev" == t ? -1 : 1)) % this.$items.length;
        return this.$items.eq(n)
    }
    ,
    i.prototype.to = function(t) {
        var e = this
          , i = this.getItemIndex(this.$active = this.$element.find(".item.active"));
        return t > this.$items.length - 1 || 0 > t ? void 0 : this.sliding ? this.$element.one("slid.bs.carousel", function() {
            e.to(t)
        }) : i == t ? this.pause().cycle() : this.slide(t > i ? "next" : "prev", this.$items.eq(t))
    }
    ,
    i.prototype.pause = function(e) {
        return e || (this.paused = !0),
        this.$element.find(".next, .prev").length && t.support.transition && (this.$element.trigger(t.support.transition.end),
        this.cycle(!0)),
        this.interval = clearInterval(this.interval),
        this
    }
    ,
    i.prototype.next = function() {
        return this.sliding ? void 0 : this.slide("next")
    }
    ,
    i.prototype.prev = function() {
        return this.sliding ? void 0 : this.slide("prev")
    }
    ,
    i.prototype.slide = function(e, n) {
        var o = this.$element.find(".item.active")
          , s = n || this.getItemForDirection(e, o)
          , r = this.interval
          , a = "next" == e ? "left" : "right"
          , l = this;
        if (s.hasClass("active"))
            return this.sliding = !1;
        var c = s[0]
          , d = t.Event("slide.bs.carousel", {
            relatedTarget: c,
            direction: a
        });
        if (this.$element.trigger(d),
        !d.isDefaultPrevented()) {
            if (this.sliding = !0,
            r && this.pause(),
            this.$indicators.length) {
                this.$indicators.find(".active").removeClass("active");
                var p = t(this.$indicators.children()[this.getItemIndex(s)]);
                p && p.addClass("active")
            }
            var u = t.Event("slid.bs.carousel", {
                relatedTarget: c,
                direction: a
            });
            return t.support.transition && this.$element.hasClass("slide") ? (s.addClass(e),
            s[0].offsetWidth,
            o.addClass(a),
            s.addClass(a),
            o.one("bsTransitionEnd", function() {
                s.removeClass([e, a].join(" ")).addClass("active"),
                o.removeClass(["active", a].join(" ")),
                l.sliding = !1,
                setTimeout(function() {
                    l.$element.trigger(u)
                }, 0)
            }).emulateTransitionEnd(i.TRANSITION_DURATION)) : (o.removeClass("active"),
            s.addClass("active"),
            this.sliding = !1,
            this.$element.trigger(u)),
            r && this.cycle(),
            this
        }
    }
    ;
    var n = t.fn.carousel;
    t.fn.carousel = e,
    t.fn.carousel.Constructor = i,
    t.fn.carousel.noConflict = function() {
        return t.fn.carousel = n,
        this
    }
    ;
    var o = function(i) {
        var n, o = t(this), s = t(o.attr("data-target") || (n = o.attr("href")) && n.replace(/.*(?=#[^\s]+$)/, ""));
        if (s.hasClass("carousel")) {
            var r = t.extend({}, s.data(), o.data())
              , a = o.attr("data-slide-to");
            a && (r.interval = !1),
            e.call(s, r),
            a && s.data("bs.carousel").to(a),
            i.preventDefault()
        }
    };
    t(document).on("click.bs.carousel.data-api", "[data-slide]", o).on("click.bs.carousel.data-api", "[data-slide-to]", o),
    t(window).on("load", function() {
        t('[data-ride="carousel"]').each(function() {
            var i = t(this);
            e.call(i, i.data())
        })
    })
}(jQuery),
function(t) {
    "use strict";
    function e(e) {
        var i, n = e.attr("data-target") || (i = e.attr("href")) && i.replace(/.*(?=#[^\s]+$)/, "");
        return t(n)
    }
    function i(e) {
        return this.each(function() {
            var i = t(this)
              , o = i.data("bs.collapse")
              , s = t.extend({}, n.DEFAULTS, i.data(), "object" == typeof e && e);
            !o && s.toggle && /show|hide/.test(e) && (s.toggle = !1),
            o || i.data("bs.collapse", o = new n(this,s)),
            "string" == typeof e && o[e]()
        })
    }
    var n = function(e, i) {
        this.$element = t(e),
        this.options = t.extend({}, n.DEFAULTS, i),
        this.$trigger = t('[data-toggle="collapse"][href="#' + e.id + '"],[data-toggle="collapse"][data-target="#' + e.id + '"]'),
        this.transitioning = null,
        this.options.parent ? this.$parent = this.getParent() : this.addAriaAndCollapsedClass(this.$element, this.$trigger),
        this.options.toggle && this.toggle()
    };
    n.VERSION = "3.3.4",
    n.TRANSITION_DURATION = 350,
    n.DEFAULTS = {
        toggle: !0
    },
    n.prototype.dimension = function() {
        return this.$element.hasClass("width") ? "width" : "height"
    }
    ,
    n.prototype.show = function() {
        if (!this.transitioning && !this.$element.hasClass("in")) {
            var e, o = this.$parent && this.$parent.children(".panel").children(".in, .collapsing");
            if (!(o && o.length && (e = o.data("bs.collapse"),
            e && e.transitioning))) {
                var s = t.Event("show.bs.collapse");
                if (this.$element.trigger(s),
                !s.isDefaultPrevented()) {
                    o && o.length && (i.call(o, "hide"),
                    e || o.data("bs.collapse", null));
                    var r = this.dimension();
                    this.$element.removeClass("collapse").addClass("collapsing")[r](0).attr("aria-expanded", !0),
                    this.$trigger.removeClass("collapsed").attr("aria-expanded", !0),
                    this.transitioning = 1;
                    var a = function() {
                        this.$element.removeClass("collapsing").addClass("collapse in")[r](""),
                        this.transitioning = 0,
                        this.$element.trigger("shown.bs.collapse")
                    };
                    if (!t.support.transition)
                        return a.call(this);
                    var l = t.camelCase(["scroll", r].join("-"));
                    this.$element.one("bsTransitionEnd", t.proxy(a, this)).emulateTransitionEnd(n.TRANSITION_DURATION)[r](this.$element[0][l])
                }
            }
        }
    }
    ,
    n.prototype.hide = function() {
        if (!this.transitioning && this.$element.hasClass("in")) {
            var e = t.Event("hide.bs.collapse");
            if (this.$element.trigger(e),
            !e.isDefaultPrevented()) {
                var i = this.dimension();
                this.$element[i](this.$element[i]())[0].offsetHeight,
                this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded", !1),
                this.$trigger.addClass("collapsed").attr("aria-expanded", !1),
                this.transitioning = 1;
                var o = function() {
                    this.transitioning = 0,
                    this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")
                };
                return t.support.transition ? void this.$element[i](0).one("bsTransitionEnd", t.proxy(o, this)).emulateTransitionEnd(n.TRANSITION_DURATION) : o.call(this)
            }
        }
    }
    ,
    n.prototype.toggle = function() {
        this[this.$element.hasClass("in") ? "hide" : "show"]()
    }
    ,
    n.prototype.getParent = function() {
        return t(this.options.parent).find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]').each(t.proxy(function(i, n) {
            var o = t(n);
            this.addAriaAndCollapsedClass(e(o), o)
        }, this)).end()
    }
    ,
    n.prototype.addAriaAndCollapsedClass = function(t, e) {
        var i = t.hasClass("in");
        t.attr("aria-expanded", i),
        e.toggleClass("collapsed", !i).attr("aria-expanded", i)
    }
    ;
    var o = t.fn.collapse;
    t.fn.collapse = i,
    t.fn.collapse.Constructor = n,
    t.fn.collapse.noConflict = function() {
        return t.fn.collapse = o,
        this
    }
    ,
    t(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function(n) {
        var o = t(this);
        o.attr("data-target") || n.preventDefault();
        var s = e(o)
          , r = s.data("bs.collapse") ? "toggle" : o.data();
        i.call(s, r)
    })
}(jQuery),
function(t) {
    "use strict";
    function e(e) {
        e && 3 === e.which || (t(n).remove(),
        t(o).each(function() {
            var n = t(this)
              , o = i(n)
              , s = {
                relatedTarget: this
            };
            o.hasClass("open") && (o.trigger(e = t.Event("hide.bs.dropdown", s)),
            e.isDefaultPrevented() || (n.attr("aria-expanded", "false"),
            o.removeClass("open").trigger("hidden.bs.dropdown", s)))
        }))
    }
    function i(e) {
        var i = e.attr("data-target");
        i || (i = (i = e.attr("href")) && /#[A-Za-z]/.test(i) && i.replace(/.*(?=#[^\s]*$)/, ""));
        var n = i && t(i);
        return n && n.length ? n : e.parent()
    }
    var n = ".dropdown-backdrop"
      , o = '[data-toggle="dropdown"]'
      , s = function(e) {
        t(e).on("click.bs.dropdown", this.toggle)
    };
    s.VERSION = "3.3.4",
    s.prototype.toggle = function(n) {
        var o = t(this);
        if (!o.is(".disabled, :disabled")) {
            var s = i(o)
              , r = s.hasClass("open");
            if (e(),
            !r) {
                "ontouchstart"in document.documentElement && !s.closest(".navbar-nav").length && t('<div class="dropdown-backdrop"/>').insertAfter(t(this)).on("click", e);
                var a = {
                    relatedTarget: this
                };
                if (s.trigger(n = t.Event("show.bs.dropdown", a)),
                n.isDefaultPrevented())
                    return;
                o.trigger("focus").attr("aria-expanded", "true"),
                s.toggleClass("open").trigger("shown.bs.dropdown", a)
            }
            return !1
        }
    }
    ,
    s.prototype.keydown = function(e) {
        if (/(38|40|27|32)/.test(e.which) && !/input|textarea/i.test(e.target.tagName)) {
            var n = t(this);
            if (e.preventDefault(),
            e.stopPropagation(),
            !n.is(".disabled, :disabled")) {
                var s = i(n)
                  , r = s.hasClass("open");
                if (!r && 27 != e.which || r && 27 == e.which)
                    return 27 == e.which && s.find(o).trigger("focus"),
                    n.trigger("click");
                var a = " li:not(.disabled):visible a"
                  , l = s.find('[role="menu"]' + a + ', [role="listbox"]' + a);
                if (l.length) {
                    var c = l.index(e.target);
                    38 == e.which && c > 0 && c--,
                    40 == e.which && c < l.length - 1 && c++,
                    ~c || (c = 0),
                    l.eq(c).trigger("focus")
                }
            }
        }
    }
    ;
    var r = t.fn.dropdown;
    t.fn.dropdown = function(e) {
        return this.each(function() {
            var i = t(this)
              , n = i.data("bs.dropdown");
            n || i.data("bs.dropdown", n = new s(this)),
            "string" == typeof e && n[e].call(i)
        })
    }
    ,
    t.fn.dropdown.Constructor = s,
    t.fn.dropdown.noConflict = function() {
        return t.fn.dropdown = r,
        this
    }
    ,
    t(document).on("click.bs.dropdown.data-api", e).on("click.bs.dropdown.data-api", ".dropdown form", function(t) {
        t.stopPropagation()
    }).on("click.bs.dropdown.data-api", o, s.prototype.toggle).on("keydown.bs.dropdown.data-api", o, s.prototype.keydown).on("keydown.bs.dropdown.data-api", '[role="menu"]', s.prototype.keydown).on("keydown.bs.dropdown.data-api", '[role="listbox"]', s.prototype.keydown)
}(jQuery),
function(t) {
    "use strict";
    function e(e, n) {
        return this.each(function() {
            var o = t(this)
              , s = o.data("bs.modal")
              , r = t.extend({}, i.DEFAULTS, o.data(), "object" == typeof e && e);
            s || o.data("bs.modal", s = new i(this,r)),
            "string" == typeof e ? s[e](n) : r.show && s.show(n)
        })
    }
    var i = function(e, i) {
        this.options = i,
        this.$body = t(document.body),
        this.$element = t(e),
        this.$dialog = this.$element.find(".modal-dialog"),
        this.$backdrop = null,
        this.isShown = null,
        this.originalBodyPad = null,
        this.scrollbarWidth = 0,
        this.ignoreBackdropClick = !1,
        this.options.remote && this.$element.find(".modal-content").load(this.options.remote, t.proxy(function() {
            this.$element.trigger("loaded.bs.modal")
        }, this))
    };
    i.VERSION = "3.3.4",
    i.TRANSITION_DURATION = 300,
    i.BACKDROP_TRANSITION_DURATION = 150,
    i.DEFAULTS = {
        backdrop: !0,
        keyboard: !0,
        show: !0
    },
    i.prototype.toggle = function(t) {
        return this.isShown ? this.hide() : this.show(t)
    }
    ,
    i.prototype.show = function(e) {
        var n = this
          , o = t.Event("show.bs.modal", {
            relatedTarget: e
        });
        this.$element.trigger(o),
        this.isShown || o.isDefaultPrevented() || (this.isShown = !0,
        this.checkScrollbar(),
        this.setScrollbar(),
        this.$body.addClass("modal-open"),
        this.escape(),
        this.resize(),
        this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', t.proxy(this.hide, this)),
        this.$dialog.on("mousedown.dismiss.bs.modal", function() {
            n.$element.one("mouseup.dismiss.bs.modal", function(e) {
                t(e.target).is(n.$element) && (n.ignoreBackdropClick = !0)
            })
        }),
        this.backdrop(function() {
            var o = t.support.transition && n.$element.hasClass("fade");
            n.$element.parent().length || n.$element.appendTo(n.$body),
            n.$element.show().scrollTop(0),
            n.adjustDialog(),
            o && n.$element[0].offsetWidth,
            n.$element.addClass("in").attr("aria-hidden", !1),
            n.enforceFocus();
            var s = t.Event("shown.bs.modal", {
                relatedTarget: e
            });
            o ? n.$dialog.one("bsTransitionEnd", function() {
                n.$element.trigger("focus").trigger(s)
            }).emulateTransitionEnd(i.TRANSITION_DURATION) : n.$element.trigger("focus").trigger(s)
        }))
    }
    ,
    i.prototype.hide = function(e) {
        e && e.preventDefault(),
        e = t.Event("hide.bs.modal"),
        this.$element.trigger(e),
        this.isShown && !e.isDefaultPrevented() && (this.isShown = !1,
        this.escape(),
        this.resize(),
        t(document).off("focusin.bs.modal"),
        this.$element.removeClass("in").attr("aria-hidden", !0).off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"),
        this.$dialog.off("mousedown.dismiss.bs.modal"),
        t.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", t.proxy(this.hideModal, this)).emulateTransitionEnd(i.TRANSITION_DURATION) : this.hideModal())
    }
    ,
    i.prototype.enforceFocus = function() {
        t(document).off("focusin.bs.modal").on("focusin.bs.modal", t.proxy(function(t) {
            this.$element[0] === t.target || this.$element.has(t.target).length || this.$element.trigger("focus")
        }, this))
    }
    ,
    i.prototype.escape = function() {
        this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", t.proxy(function(t) {
            27 == t.which && this.hide()
        }, this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal")
    }
    ,
    i.prototype.resize = function() {
        this.isShown ? t(window).on("resize.bs.modal", t.proxy(this.handleUpdate, this)) : t(window).off("resize.bs.modal")
    }
    ,
    i.prototype.hideModal = function() {
        var t = this;
        this.$element.hide(),
        this.backdrop(function() {
            t.$body.removeClass("modal-open"),
            t.resetAdjustments(),
            t.resetScrollbar(),
            t.$element.trigger("hidden.bs.modal")
        })
    }
    ,
    i.prototype.removeBackdrop = function() {
        this.$backdrop && this.$backdrop.remove(),
        this.$backdrop = null
    }
    ,
    i.prototype.backdrop = function(e) {
        var n = this
          , o = this.$element.hasClass("fade") ? "fade" : "";
        if (this.isShown && this.options.backdrop) {
            var s = t.support.transition && o;
            if (this.$backdrop = t('<div class="modal-backdrop ' + o + '" />').appendTo(this.$body),
            this.$element.on("click.dismiss.bs.modal", t.proxy(function(t) {
                return this.ignoreBackdropClick ? void (this.ignoreBackdropClick = !1) : void (t.target === t.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus() : this.hide()))
            }, this)),
            s && this.$backdrop[0].offsetWidth,
            this.$backdrop.addClass("in"),
            !e)
                return;
            s ? this.$backdrop.one("bsTransitionEnd", e).emulateTransitionEnd(i.BACKDROP_TRANSITION_DURATION) : e()
        } else if (!this.isShown && this.$backdrop) {
            this.$backdrop.removeClass("in");
            var r = function() {
                n.removeBackdrop(),
                e && e()
            };
            t.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", r).emulateTransitionEnd(i.BACKDROP_TRANSITION_DURATION) : r()
        } else
            e && e()
    }
    ,
    i.prototype.handleUpdate = function() {
        this.adjustDialog()
    }
    ,
    i.prototype.adjustDialog = function() {
        var t = this.$element[0].scrollHeight > document.documentElement.clientHeight;
        this.$element.css({
            paddingLeft: !this.bodyIsOverflowing && t ? this.scrollbarWidth : "",
            paddingRight: this.bodyIsOverflowing && !t ? this.scrollbarWidth : ""
        })
    }
    ,
    i.prototype.resetAdjustments = function() {
        this.$element.css({
            paddingLeft: "",
            paddingRight: ""
        })
    }
    ,
    i.prototype.checkScrollbar = function() {
        var t = window.innerWidth;
        if (!t) {
            var e = document.documentElement.getBoundingClientRect();
            t = e.right - Math.abs(e.left)
        }
        this.bodyIsOverflowing = document.body.clientWidth < t,
        this.scrollbarWidth = this.measureScrollbar()
    }
    ,
    i.prototype.setScrollbar = function() {
        var t = parseInt(this.$body.css("padding-right") || 0, 10);
        this.originalBodyPad = document.body.style.paddingRight || "",
        this.bodyIsOverflowing && this.$body.css("padding-right", t + this.scrollbarWidth)
    }
    ,
    i.prototype.resetScrollbar = function() {
        this.$body.css("padding-right", this.originalBodyPad)
    }
    ,
    i.prototype.measureScrollbar = function() {
        var t = document.createElement("div");
        t.className = "modal-scrollbar-measure",
        this.$body.append(t);
        var e = t.offsetWidth - t.clientWidth;
        return this.$body[0].removeChild(t),
        e
    }
    ;
    var n = t.fn.modal;
    t.fn.modal = e,
    t.fn.modal.Constructor = i,
    t.fn.modal.noConflict = function() {
        return t.fn.modal = n,
        this
    }
    ,
    t(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function(i) {
        var n = t(this)
          , o = n.attr("href")
          , s = t(n.attr("data-target") || o && o.replace(/.*(?=#[^\s]+$)/, ""))
          , r = s.data("bs.modal") ? "toggle" : t.extend({
            remote: !/#/.test(o) && o
        }, s.data(), n.data());
        n.is("a") && i.preventDefault(),
        s.one("show.bs.modal", function(t) {
            t.isDefaultPrevented() || s.one("hidden.bs.modal", function() {
                n.is(":visible") && n.trigger("focus")
            })
        }),
        e.call(s, r, this)
    })
}(jQuery),
function(t) {
    "use strict";
    var e = function(t, e) {
        this.type = null,
        this.options = null,
        this.enabled = null,
        this.timeout = null,
        this.hoverState = null,
        this.$element = null,
        this.init("tooltip", t, e)
    };
    e.VERSION = "3.3.4",
    e.TRANSITION_DURATION = 150,
    e.DEFAULTS = {
        animation: !0,
        placement: "top",
        selector: !1,
        template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
        trigger: "hover focus",
        title: "",
        delay: 0,
        html: !1,
        container: !1,
        viewport: {
            selector: "body",
            padding: 0
        }
    },
    e.prototype.init = function(e, i, n) {
        if (this.enabled = !0,
        this.type = e,
        this.$element = t(i),
        this.options = this.getOptions(n),
        this.$viewport = this.options.viewport && t(this.options.viewport.selector || this.options.viewport),
        this.$element[0]instanceof document.constructor && !this.options.selector)
            throw new Error("`selector` option must be specified when initializing " + this.type + " on the window.document object!");
        for (var o = this.options.trigger.split(" "), s = o.length; s--; ) {
            var r = o[s];
            if ("click" == r)
                this.$element.on("click." + this.type, this.options.selector, t.proxy(this.toggle, this));
            else if ("manual" != r) {
                var a = "hover" == r ? "mouseenter" : "focusin"
                  , l = "hover" == r ? "mouseleave" : "focusout";
                this.$element.on(a + "." + this.type, this.options.selector, t.proxy(this.enter, this)),
                this.$element.on(l + "." + this.type, this.options.selector, t.proxy(this.leave, this))
            }
        }
        this.options.selector ? this._options = t.extend({}, this.options, {
            trigger: "manual",
            selector: ""
        }) : this.fixTitle()
    }
    ,
    e.prototype.getDefaults = function() {
        return e.DEFAULTS
    }
    ,
    e.prototype.getOptions = function(e) {
        return (e = t.extend({}, this.getDefaults(), this.$element.data(), e)).delay && "number" == typeof e.delay && (e.delay = {
            show: e.delay,
            hide: e.delay
        }),
        e
    }
    ,
    e.prototype.getDelegateOptions = function() {
        var e = {}
          , i = this.getDefaults();
        return this._options && t.each(this._options, function(t, n) {
            i[t] != n && (e[t] = n)
        }),
        e
    }
    ,
    e.prototype.enter = function(e) {
        var i = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type);
        return i && i.$tip && i.$tip.is(":visible") ? void (i.hoverState = "in") : (i || (i = new this.constructor(e.currentTarget,this.getDelegateOptions()),
        t(e.currentTarget).data("bs." + this.type, i)),
        clearTimeout(i.timeout),
        i.hoverState = "in",
        i.options.delay && i.options.delay.show ? void (i.timeout = setTimeout(function() {
            "in" == i.hoverState && i.show()
        }, i.options.delay.show)) : i.show())
    }
    ,
    e.prototype.leave = function(e) {
        var i = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type);
        return i || (i = new this.constructor(e.currentTarget,this.getDelegateOptions()),
        t(e.currentTarget).data("bs." + this.type, i)),
        clearTimeout(i.timeout),
        i.hoverState = "out",
        i.options.delay && i.options.delay.hide ? void (i.timeout = setTimeout(function() {
            "out" == i.hoverState && i.hide()
        }, i.options.delay.hide)) : i.hide()
    }
    ,
    e.prototype.show = function() {
        var i = t.Event("show.bs." + this.type);
        if (this.hasContent() && this.enabled) {
            this.$element.trigger(i);
            var n = t.contains(this.$element[0].ownerDocument.documentElement, this.$element[0]);
            if (i.isDefaultPrevented() || !n)
                return;
            var o = this
              , s = this.tip()
              , r = this.getUID(this.type);
            this.setContent(),
            s.attr("id", r),
            this.$element.attr("aria-describedby", r),
            this.options.animation && s.addClass("fade");
            var a = "function" == typeof this.options.placement ? this.options.placement.call(this, s[0], this.$element[0]) : this.options.placement
              , l = /\s?auto?\s?/i
              , c = l.test(a);
            c && (a = a.replace(l, "") || "top"),
            s.detach().css({
                top: 0,
                left: 0,
                display: "block"
            }).addClass(a).data("bs." + this.type, this),
            this.options.container ? s.appendTo(this.options.container) : s.insertAfter(this.$element);
            var d = this.getPosition()
              , p = s[0].offsetWidth
              , u = s[0].offsetHeight;
            if (c) {
                var h = a
                  , f = this.options.container ? t(this.options.container) : this.$element.parent()
                  , m = this.getPosition(f);
                a = "bottom" == a && d.bottom + u > m.bottom ? "top" : "top" == a && d.top - u < m.top ? "bottom" : "right" == a && d.right + p > m.width ? "left" : "left" == a && d.left - p < m.left ? "right" : a,
                s.removeClass(h).addClass(a)
            }
            var g = this.getCalculatedOffset(a, d, p, u);
            this.applyPlacement(g, a);
            var v = function() {
                var t = o.hoverState;
                o.$element.trigger("shown.bs." + o.type),
                o.hoverState = null,
                "out" == t && o.leave(o)
            };
            t.support.transition && this.$tip.hasClass("fade") ? s.one("bsTransitionEnd", v).emulateTransitionEnd(e.TRANSITION_DURATION) : v()
        }
    }
    ,
    e.prototype.applyPlacement = function(e, i) {
        var n = this.tip()
          , o = n[0].offsetWidth
          , s = n[0].offsetHeight
          , r = parseInt(n.css("margin-top"), 10)
          , a = parseInt(n.css("margin-left"), 10);
        isNaN(r) && (r = 0),
        isNaN(a) && (a = 0),
        e.top = e.top + r,
        e.left = e.left + a,
        t.offset.setOffset(n[0], t.extend({
            using: function(t) {
                n.css({
                    top: Math.round(t.top),
                    left: Math.round(t.left)
                })
            }
        }, e), 0),
        n.addClass("in");
        var l = n[0].offsetWidth
          , c = n[0].offsetHeight;
        "top" == i && c != s && (e.top = e.top + s - c);
        var d = this.getViewportAdjustedDelta(i, e, l, c);
        d.left ? e.left += d.left : e.top += d.top;
        var p = /top|bottom/.test(i)
          , u = p ? 2 * d.left - o + l : 2 * d.top - s + c
          , h = p ? "offsetWidth" : "offsetHeight";
        n.offset(e),
        this.replaceArrow(u, n[0][h], p)
    }
    ,
    e.prototype.replaceArrow = function(t, e, i) {
        this.arrow().css(i ? "left" : "top", 50 * (1 - t / e) + "%").css(i ? "top" : "left", "")
    }
    ,
    e.prototype.setContent = function() {
        var t = this.tip()
          , e = this.getTitle();
        t.find(".tooltip-inner")[this.options.html ? "html" : "text"](e),
        t.removeClass("fade in top bottom left right")
    }
    ,
    e.prototype.hide = function(i) {
        function n() {
            "in" != o.hoverState && s.detach(),
            o.$element.removeAttr("aria-describedby").trigger("hidden.bs." + o.type),
            i && i()
        }
        var o = this
          , s = t(this.$tip)
          , r = t.Event("hide.bs." + this.type);
        return this.$element.trigger(r),
        r.isDefaultPrevented() ? void 0 : (s.removeClass("in"),
        t.support.transition && s.hasClass("fade") ? s.one("bsTransitionEnd", n).emulateTransitionEnd(e.TRANSITION_DURATION) : n(),
        this.hoverState = null,
        this)
    }
    ,
    e.prototype.fixTitle = function() {
        var t = this.$element;
        (t.attr("title") || "string" != typeof t.attr("data-original-title")) && t.attr("data-original-title", t.attr("title") || "").attr("title", "")
    }
    ,
    e.prototype.hasContent = function() {
        return this.getTitle()
    }
    ,
    e.prototype.getPosition = function(e) {
        var i = (e = e || this.$element)[0]
          , n = "BODY" == i.tagName
          , o = i.getBoundingClientRect();
        null == o.width && (o = t.extend({}, o, {
            width: o.right - o.left,
            height: o.bottom - o.top
        }));
        var s = n ? {
            top: 0,
            left: 0
        } : e.offset()
          , r = {
            scroll: n ? document.documentElement.scrollTop || document.body.scrollTop : e.scrollTop()
        }
          , a = n ? {
            width: t(window).width(),
            height: t(window).height()
        } : null;
        return t.extend({}, o, r, a, s)
    }
    ,
    e.prototype.getCalculatedOffset = function(t, e, i, n) {
        return "bottom" == t ? {
            top: e.top + e.height,
            left: e.left + e.width / 2 - i / 2
        } : "top" == t ? {
            top: e.top - n,
            left: e.left + e.width / 2 - i / 2
        } : "left" == t ? {
            top: e.top + e.height / 2 - n / 2,
            left: e.left - i
        } : {
            top: e.top + e.height / 2 - n / 2,
            left: e.left + e.width
        }
    }
    ,
    e.prototype.getViewportAdjustedDelta = function(t, e, i, n) {
        var o = {
            top: 0,
            left: 0
        };
        if (!this.$viewport)
            return o;
        var s = this.options.viewport && this.options.viewport.padding || 0
          , r = this.getPosition(this.$viewport);
        if (/right|left/.test(t)) {
            var a = e.top - s - r.scroll
              , l = e.top + s - r.scroll + n;
            a < r.top ? o.top = r.top - a : l > r.top + r.height && (o.top = r.top + r.height - l)
        } else {
            var c = e.left - s
              , d = e.left + s + i;
            c < r.left ? o.left = r.left - c : d > r.width && (o.left = r.left + r.width - d)
        }
        return o
    }
    ,
    e.prototype.getTitle = function() {
        var t = this.$element
          , e = this.options;
        return t.attr("data-original-title") || ("function" == typeof e.title ? e.title.call(t[0]) : e.title)
    }
    ,
    e.prototype.getUID = function(t) {
        do {
            t += ~~(1e6 * Math.random())
        } while (document.getElementById(t));return t
    }
    ,
    e.prototype.tip = function() {
        return this.$tip = this.$tip || t(this.options.template)
    }
    ,
    e.prototype.arrow = function() {
        return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
    }
    ,
    e.prototype.enable = function() {
        this.enabled = !0
    }
    ,
    e.prototype.disable = function() {
        this.enabled = !1
    }
    ,
    e.prototype.toggleEnabled = function() {
        this.enabled = !this.enabled
    }
    ,
    e.prototype.toggle = function(e) {
        var i = this;
        e && ((i = t(e.currentTarget).data("bs." + this.type)) || (i = new this.constructor(e.currentTarget,this.getDelegateOptions()),
        t(e.currentTarget).data("bs." + this.type, i))),
        i.tip().hasClass("in") ? i.leave(i) : i.enter(i)
    }
    ,
    e.prototype.destroy = function() {
        var t = this;
        clearTimeout(this.timeout),
        this.hide(function() {
            t.$element.off("." + t.type).removeData("bs." + t.type)
        })
    }
    ;
    var i = t.fn.tooltip;
    t.fn.tooltip = function(i) {
        return this.each(function() {
            var n = t(this)
              , o = n.data("bs.tooltip")
              , s = "object" == typeof i && i;
            (o || !/destroy|hide/.test(i)) && (o || n.data("bs.tooltip", o = new e(this,s)),
            "string" == typeof i && o[i]())
        })
    }
    ,
    t.fn.tooltip.Constructor = e,
    t.fn.tooltip.noConflict = function() {
        return t.fn.tooltip = i,
        this
    }
}(jQuery),
function(t) {
    "use strict";
    var e = function(t, e) {
        this.init("popover", t, e)
    };
    if (!t.fn.tooltip)
        throw new Error("Popover requires tooltip.js");
    e.VERSION = "3.3.4",
    e.DEFAULTS = t.extend({}, t.fn.tooltip.Constructor.DEFAULTS, {
        placement: "right",
        trigger: "click",
        content: "",
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
    }),
    e.prototype = t.extend({}, t.fn.tooltip.Constructor.prototype),
    e.prototype.constructor = e,
    e.prototype.getDefaults = function() {
        return e.DEFAULTS
    }
    ,
    e.prototype.setContent = function() {
        var t = this.tip()
          , e = this.getTitle()
          , i = this.getContent();
        t.find(".popover-title")[this.options.html ? "html" : "text"](e),
        t.find(".popover-content").children().detach().end()[this.options.html ? "string" == typeof i ? "html" : "append" : "text"](i),
        t.removeClass("fade top bottom left right in"),
        t.find(".popover-title").html() || t.find(".popover-title").hide()
    }
    ,
    e.prototype.hasContent = function() {
        return this.getTitle() || this.getContent()
    }
    ,
    e.prototype.getContent = function() {
        var t = this.$element
          , e = this.options;
        return t.attr("data-content") || ("function" == typeof e.content ? e.content.call(t[0]) : e.content)
    }
    ,
    e.prototype.arrow = function() {
        return this.$arrow = this.$arrow || this.tip().find(".arrow")
    }
    ;
    var i = t.fn.popover;
    t.fn.popover = function(i) {
        return this.each(function() {
            var n = t(this)
              , o = n.data("bs.popover")
              , s = "object" == typeof i && i;
            (o || !/destroy|hide/.test(i)) && (o || n.data("bs.popover", o = new e(this,s)),
            "string" == typeof i && o[i]())
        })
    }
    ,
    t.fn.popover.Constructor = e,
    t.fn.popover.noConflict = function() {
        return t.fn.popover = i,
        this
    }
}(jQuery),
function(t) {
    "use strict";
    function e(i, n) {
        this.$body = t(document.body),
        this.$scrollElement = t(t(i).is(document.body) ? window : i),
        this.options = t.extend({}, e.DEFAULTS, n),
        this.selector = (this.options.target || "") + " .nav li > a",
        this.offsets = [],
        this.targets = [],
        this.activeTarget = null,
        this.scrollHeight = 0,
        this.$scrollElement.on("scroll.bs.scrollspy", t.proxy(this.process, this)),
        this.refresh(),
        this.process()
    }
    function i(i) {
        return this.each(function() {
            var n = t(this)
              , o = n.data("bs.scrollspy")
              , s = "object" == typeof i && i;
            o || n.data("bs.scrollspy", o = new e(this,s)),
            "string" == typeof i && o[i]()
        })
    }
    e.VERSION = "3.3.4",
    e.DEFAULTS = {
        offset: 10
    },
    e.prototype.getScrollHeight = function() {
        return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
    }
    ,
    e.prototype.refresh = function() {
        var e = this
          , i = "offset"
          , n = 0;
        this.offsets = [],
        this.targets = [],
        this.scrollHeight = this.getScrollHeight(),
        t.isWindow(this.$scrollElement[0]) || (i = "position",
        n = this.$scrollElement.scrollTop()),
        this.$body.find(this.selector).map(function() {
            var e = t(this)
              , o = e.data("target") || e.attr("href")
              , s = /^#./.test(o) && t(o);
            return s && s.length && s.is(":visible") && [[s[i]().top + n, o]] || null
        }).sort(function(t, e) {
            return t[0] - e[0]
        }).each(function() {
            e.offsets.push(this[0]),
            e.targets.push(this[1])
        })
    }
    ,
    e.prototype.process = function() {
        var t, e = this.$scrollElement.scrollTop() + this.options.offset, i = this.getScrollHeight(), n = this.options.offset + i - this.$scrollElement.height(), o = this.offsets, s = this.targets, r = this.activeTarget;
        if (this.scrollHeight != i && this.refresh(),
        e >= n)
            return r != (t = s[s.length - 1]) && this.activate(t);
        if (r && e < o[0])
            return this.activeTarget = null,
            this.clear();
        for (t = o.length; t--; )
            r != s[t] && e >= o[t] && (void 0 === o[t + 1] || e < o[t + 1]) && this.activate(s[t])
    }
    ,
    e.prototype.activate = function(e) {
        this.activeTarget = e,
        this.clear();
        var i = this.selector + '[data-target="' + e + '"],' + this.selector + '[href="' + e + '"]'
          , n = t(i).parents("li").addClass("active");
        n.parent(".dropdown-menu").length && (n = n.closest("li.dropdown").addClass("active")),
        n.trigger("activate.bs.scrollspy")
    }
    ,
    e.prototype.clear = function() {
        t(this.selector).parentsUntil(this.options.target, ".active").removeClass("active")
    }
    ;
    var n = t.fn.scrollspy;
    t.fn.scrollspy = i,
    t.fn.scrollspy.Constructor = e,
    t.fn.scrollspy.noConflict = function() {
        return t.fn.scrollspy = n,
        this
    }
    ,
    t(window).on("load.bs.scrollspy.data-api", function() {
        t('[data-spy="scroll"]').each(function() {
            var e = t(this);
            i.call(e, e.data())
        })
    })
}(jQuery),
function(t) {
    "use strict";
    function e(e) {
        return this.each(function() {
            var n = t(this)
              , o = n.data("bs.tab");
            o || n.data("bs.tab", o = new i(this)),
            "string" == typeof e && o[e]()
        })
    }
    var i = function(e) {
        this.element = t(e)
    };
    i.VERSION = "3.3.4",
    i.TRANSITION_DURATION = 150,
    i.prototype.show = function() {
        var e = this.element
          , i = e.closest("ul:not(.dropdown-menu)")
          , n = e.data("target");
        if (n || (n = (n = e.attr("href")) && n.replace(/.*(?=#[^\s]*$)/, "")),
        !e.parent("li").hasClass("active")) {
            var o = i.find(".active:last a")
              , s = t.Event("hide.bs.tab", {
                relatedTarget: e[0]
            })
              , r = t.Event("show.bs.tab", {
                relatedTarget: o[0]
            });
            if (o.trigger(s),
            e.trigger(r),
            !r.isDefaultPrevented() && !s.isDefaultPrevented()) {
                var a = t(n);
                this.activate(e.closest("li"), i),
                this.activate(a, a.parent(), function() {
                    o.trigger({
                        type: "hidden.bs.tab",
                        relatedTarget: e[0]
                    }),
                    e.trigger({
                        type: "shown.bs.tab",
                        relatedTarget: o[0]
                    })
                })
            }
        }
    }
    ,
    i.prototype.activate = function(e, n, o) {
        function s() {
            r.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !1),
            e.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded", !0),
            a ? (e[0].offsetWidth,
            e.addClass("in")) : e.removeClass("fade"),
            e.parent(".dropdown-menu").length && e.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !0),
            o && o()
        }
        var r = n.find("> .active")
          , a = o && t.support.transition && (r.length && r.hasClass("fade") || !!n.find("> .fade").length);
        r.length && a ? r.one("bsTransitionEnd", s).emulateTransitionEnd(i.TRANSITION_DURATION) : s(),
        r.removeClass("in")
    }
    ;
    var n = t.fn.tab;
    t.fn.tab = e,
    t.fn.tab.Constructor = i,
    t.fn.tab.noConflict = function() {
        return t.fn.tab = n,
        this
    }
    ;
    var o = function(i) {
        i.preventDefault(),
        e.call(t(this), "show")
    };
    t(document).on("click.bs.tab.data-api", '[data-toggle="tab"]', o).on("click.bs.tab.data-api", '[data-toggle="pill"]', o)
}(jQuery),
function(t) {
    "use strict";
    function e(e) {
        return this.each(function() {
            var n = t(this)
              , o = n.data("bs.affix")
              , s = "object" == typeof e && e;
            o || n.data("bs.affix", o = new i(this,s)),
            "string" == typeof e && o[e]()
        })
    }
    var i = function(e, n) {
        this.options = t.extend({}, i.DEFAULTS, n),
        this.$target = t(this.options.target).on("scroll.bs.affix.data-api", t.proxy(this.checkPosition, this)).on("click.bs.affix.data-api", t.proxy(this.checkPositionWithEventLoop, this)),
        this.$element = t(e),
        this.affixed = null,
        this.unpin = null,
        this.pinnedOffset = null,
        this.checkPosition()
    };
    i.VERSION = "3.3.4",
    i.RESET = "affix affix-top affix-bottom",
    i.DEFAULTS = {
        offset: 0,
        target: window
    },
    i.prototype.getState = function(t, e, i, n) {
        var o = this.$target.scrollTop()
          , s = this.$element.offset()
          , r = this.$target.height();
        if (null != i && "top" == this.affixed)
            return i > o && "top";
        if ("bottom" == this.affixed)
            return null != i ? !(o + this.unpin <= s.top) && "bottom" : !(t - n >= o + r) && "bottom";
        var a = null == this.affixed
          , l = a ? o : s.top;
        return null != i && i >= o ? "top" : null != n && l + (a ? r : e) >= t - n && "bottom"
    }
    ,
    i.prototype.getPinnedOffset = function() {
        if (this.pinnedOffset)
            return this.pinnedOffset;
        this.$element.removeClass(i.RESET).addClass("affix");
        var t = this.$target.scrollTop()
          , e = this.$element.offset();
        return this.pinnedOffset = e.top - t
    }
    ,
    i.prototype.checkPositionWithEventLoop = function() {
        setTimeout(t.proxy(this.checkPosition, this), 1)
    }
    ,
    i.prototype.checkPosition = function() {
        if (this.$element.is(":visible")) {
            var e = this.$element.height()
              , n = this.options.offset
              , o = n.top
              , s = n.bottom
              , r = t(document.body).height();
            "object" != typeof n && (s = o = n),
            "function" == typeof o && (o = n.top(this.$element)),
            "function" == typeof s && (s = n.bottom(this.$element));
            var a = this.getState(r, e, o, s);
            if (this.affixed != a) {
                null != this.unpin && this.$element.css("top", "");
                var l = "affix" + (a ? "-" + a : "")
                  , c = t.Event(l + ".bs.affix");
                if (this.$element.trigger(c),
                c.isDefaultPrevented())
                    return;
                this.affixed = a,
                this.unpin = "bottom" == a ? this.getPinnedOffset() : null,
                this.$element.removeClass(i.RESET).addClass(l).trigger(l.replace("affix", "affixed") + ".bs.affix")
            }
            "bottom" == a && this.$element.offset({
                top: r - e - s
            })
        }
    }
    ;
    var n = t.fn.affix;
    t.fn.affix = e,
    t.fn.affix.Constructor = i,
    t.fn.affix.noConflict = function() {
        return t.fn.affix = n,
        this
    }
    ,
    t(window).on("load", function() {
        t('[data-spy="affix"]').each(function() {
            var i = t(this)
              , n = i.data();
            n.offset = n.offset || {},
            null != n.offsetBottom && (n.offset.bottom = n.offsetBottom),
            null != n.offsetTop && (n.offset.top = n.offsetTop),
            e.call(i, n)
        })
    })
}(jQuery),
"function" != typeof Object.create && (Object.create = function(t) {
    function e() {}
    return e.prototype = t,
    new e
}
),
function(t, e, i) {
    var n = {
        init: function(e, i) {
            this.$elem = t(i),
            this.options = t.extend({}, t.fn.owlCarousel.options, this.$elem.data(), e),
            this.userOptions = e,
            this.loadContent()
        },
        loadContent: function() {
            var e, i = this;
            "function" == typeof i.options.beforeInit && i.options.beforeInit.apply(this, [i.$elem]),
            "string" == typeof i.options.jsonPath ? (e = i.options.jsonPath,
            t.getJSON(e, function(t) {
                var e, n = "";
                if ("function" == typeof i.options.jsonSuccess)
                    i.options.jsonSuccess.apply(this, [t]);
                else {
                    for (e in t.owl)
                        t.owl.hasOwnProperty(e) && (n += t.owl[e].item);
                    i.$elem.html(n)
                }
                i.logIn()
            })) : i.logIn()
        },
        logIn: function() {
            this.$elem.data("owl-originalStyles", this.$elem.attr("style")),
            this.$elem.data("owl-originalClasses", this.$elem.attr("class")),
            this.$elem.css({
                opacity: 0
            }),
            this.orignalItems = this.options.items,
            this.checkBrowser(),
            this.wrapperWidth = 0,
            this.checkVisible = null,
            this.setVars()
        },
        setVars: function() {
            if (0 === this.$elem.children().length)
                return !1;
            this.baseClass(),
            this.eventTypes(),
            this.$userItems = this.$elem.children(),
            this.itemsAmount = this.$userItems.length,
            this.wrapItems(),
            this.$owlItems = this.$elem.find(".owl-item"),
            this.$owlWrapper = this.$elem.find(".owl-wrapper"),
            this.playDirection = "next",
            this.prevItem = 0,
            this.prevArr = [0],
            this.currentItem = 0,
            this.customEvents(),
            this.onStartup()
        },
        onStartup: function() {
            this.updateItems(),
            this.calculateAll(),
            this.buildControls(),
            this.updateControls(),
            this.response(),
            this.moveEvents(),
            this.stopOnHover(),
            this.owlStatus(),
            !1 !== this.options.transitionStyle && this.transitionTypes(this.options.transitionStyle),
            !0 === this.options.autoPlay && (this.options.autoPlay = 5e3),
            this.play(),
            this.$elem.find(".owl-wrapper").css("display", "block"),
            this.$elem.is(":visible") ? this.$elem.css("opacity", 1) : this.watchVisibility(),
            this.onstartup = !1,
            this.eachMoveUpdate(),
            "function" == typeof this.options.afterInit && this.options.afterInit.apply(this, [this.$elem])
        },
        eachMoveUpdate: function() {
            !0 === this.options.lazyLoad && this.lazyLoad(),
            !0 === this.options.autoHeight && this.autoHeight(),
            this.onVisibleItems(),
            "function" == typeof this.options.afterAction && this.options.afterAction.apply(this, [this.$elem])
        },
        updateVars: function() {
            "function" == typeof this.options.beforeUpdate && this.options.beforeUpdate.apply(this, [this.$elem]),
            this.watchVisibility(),
            this.updateItems(),
            this.calculateAll(),
            this.updatePosition(),
            this.updateControls(),
            this.eachMoveUpdate(),
            "function" == typeof this.options.afterUpdate && this.options.afterUpdate.apply(this, [this.$elem])
        },
        reload: function() {
            var t = this;
            e.setTimeout(function() {
                t.updateVars()
            }, 0)
        },
        watchVisibility: function() {
            var t = this;
            if (!1 !== t.$elem.is(":visible"))
                return !1;
            t.$elem.css({
                opacity: 0
            }),
            e.clearInterval(t.autoPlayInterval),
            e.clearInterval(t.checkVisible),
            t.checkVisible = e.setInterval(function() {
                t.$elem.is(":visible") && (t.reload(),
                t.$elem.animate({
                    opacity: 1
                }, 200),
                e.clearInterval(t.checkVisible))
            }, 500)
        },
        wrapItems: function() {
            this.$userItems.wrapAll('<div class="owl-wrapper">').wrap('<div class="owl-item"></div>'),
            this.$elem.find(".owl-wrapper").wrap('<div class="owl-wrapper-outer">'),
            this.wrapperOuter = this.$elem.find(".owl-wrapper-outer"),
            this.$elem.css("display", "block")
        },
        baseClass: function() {
            var t = this.$elem.hasClass(this.options.baseClass)
              , e = this.$elem.hasClass(this.options.theme);
            t || this.$elem.addClass(this.options.baseClass),
            e || this.$elem.addClass(this.options.theme)
        },
        updateItems: function() {
            var e, i;
            if (!1 === this.options.responsive)
                return !1;
            if (!0 === this.options.singleItem)
                return this.options.items = this.orignalItems = 1,
                this.options.itemsCustom = !1,
                this.options.itemsDesktop = !1,
                this.options.itemsDesktopSmall = !1,
                this.options.itemsTablet = !1,
                this.options.itemsTabletSmall = !1,
                this.options.itemsMobile = !1;
            if ((e = t(this.options.responsiveBaseWidth).width()) > (this.options.itemsDesktop[0] || this.orignalItems) && (this.options.items = this.orignalItems),
            !1 !== this.options.itemsCustom)
                for (this.options.itemsCustom.sort(function(t, e) {
                    return t[0] - e[0]
                }),
                i = 0; i < this.options.itemsCustom.length; i += 1)
                    this.options.itemsCustom[i][0] <= e && (this.options.items = this.options.itemsCustom[i][1]);
            else
                e <= this.options.itemsDesktop[0] && !1 !== this.options.itemsDesktop && (this.options.items = this.options.itemsDesktop[1]),
                e <= this.options.itemsDesktopSmall[0] && !1 !== this.options.itemsDesktopSmall && (this.options.items = this.options.itemsDesktopSmall[1]),
                e <= this.options.itemsTablet[0] && !1 !== this.options.itemsTablet && (this.options.items = this.options.itemsTablet[1]),
                e <= this.options.itemsTabletSmall[0] && !1 !== this.options.itemsTabletSmall && (this.options.items = this.options.itemsTabletSmall[1]),
                e <= this.options.itemsMobile[0] && !1 !== this.options.itemsMobile && (this.options.items = this.options.itemsMobile[1]);
            this.options.items > this.itemsAmount && !0 === this.options.itemsScaleUp && (this.options.items = this.itemsAmount)
        },
        response: function() {
            var i, n, o = this;
            if (!0 !== o.options.responsive)
                return !1;
            n = t(e).width(),
            o.resizer = function() {
                t(e).width() !== n && (!1 !== o.options.autoPlay && e.clearInterval(o.autoPlayInterval),
                e.clearTimeout(i),
                i = e.setTimeout(function() {
                    n = t(e).width(),
                    o.updateVars()
                }, o.options.responsiveRefreshRate))
            }
            ,
            t(e).resize(o.resizer)
        },
        updatePosition: function() {
            this.jumpTo(this.currentItem),
            !1 !== this.options.autoPlay && this.checkAp()
        },
        appendItemsSizes: function() {
            var e = this
              , i = 0
              , n = e.itemsAmount - e.options.items;
            e.$owlItems.each(function(o) {
                var s = t(this);
                s.css({
                    width: e.itemWidth
                }).data("owl-item", Number(o)),
                0 != o % e.options.items && o !== n || o > n || (i += 1),
                s.data("owl-roundPages", i)
            })
        },
        appendWrapperSizes: function() {
            this.$owlWrapper.css({
                width: this.$owlItems.length * this.itemWidth * 2,
                left: 0
            }),
            this.appendItemsSizes()
        },
        calculateAll: function() {
            this.calculateWidth(),
            this.appendWrapperSizes(),
            this.loops(),
            this.max()
        },
        calculateWidth: function() {
            this.itemWidth = Math.round(this.$elem.width() / this.options.items)
        },
        max: function() {
            var t = -1 * (this.itemsAmount * this.itemWidth - this.options.items * this.itemWidth);
            return this.options.items > this.itemsAmount ? this.maximumPixels = t = this.maximumItem = 0 : (this.maximumItem = this.itemsAmount - this.options.items,
            this.maximumPixels = t),
            t
        },
        min: function() {
            return 0
        },
        loops: function() {
            var e, i, n = 0, o = 0;
            for (this.positionsInArray = [0],
            this.pagesInArray = [],
            e = 0; e < this.itemsAmount; e += 1)
                o += this.itemWidth,
                this.positionsInArray.push(-o),
                !0 === this.options.scrollPerPage && ((i = (i = t(this.$owlItems[e])).data("owl-roundPages")) !== n && (this.pagesInArray[n] = this.positionsInArray[e],
                n = i))
        },
        buildControls: function() {
            !0 !== this.options.navigation && !0 !== this.options.pagination || (this.owlControls = t('<div class="owl-controls"/>').toggleClass("clickable", !this.browser.isTouch).appendTo(this.$elem)),
            !0 === this.options.pagination && this.buildPagination(),
            !0 === this.options.navigation && this.buildButtons()
        },
        buildButtons: function() {
            var e = this
              , i = t('<div class="owl-buttons"/>');
            e.owlControls.append(i),
            e.buttonPrev = t("<div/>", {
                class: "owl-prev",
                html: e.options.navigationText[0] || ""
            }),
            e.buttonNext = t("<div/>", {
                class: "owl-next",
                html: e.options.navigationText[1] || ""
            }),
            i.append(e.buttonPrev).append(e.buttonNext),
            i.on("touchstart.owlControls mousedown.owlControls", 'div[class^="owl"]', function(t) {
                t.preventDefault()
            }),
            i.on("touchend.owlControls mouseup.owlControls", 'div[class^="owl"]', function(i) {
                i.preventDefault(),
                t(this).hasClass("owl-next") ? e.next() : e.prev()
            })
        },
        buildPagination: function() {
            var e = this;
            e.paginationWrapper = t('<div class="owl-pagination"/>'),
            e.owlControls.append(e.paginationWrapper),
            e.paginationWrapper.on("touchend.owlControls mouseup.owlControls", ".owl-page", function(i) {
                i.preventDefault(),
                Number(t(this).data("owl-page")) !== e.currentItem && e.goTo(Number(t(this).data("owl-page")), !0)
            })
        },
        updatePagination: function() {
            var e, i, n, o, s, r;
            if (!1 === this.options.pagination)
                return !1;
            for (this.paginationWrapper.html(""),
            e = 0,
            i = this.itemsAmount - this.itemsAmount % this.options.items,
            o = 0; o < this.itemsAmount; o += 1)
                0 == o % this.options.items && (e += 1,
                i === o && (n = this.itemsAmount - this.options.items),
                s = t("<div/>", {
                    class: "owl-page"
                }),
                r = t("<span></span>", {
                    text: !0 === this.options.paginationNumbers ? e : "",
                    class: !0 === this.options.paginationNumbers ? "owl-numbers" : ""
                }),
                s.append(r),
                s.data("owl-page", i === o ? n : o),
                s.data("owl-roundPages", e),
                this.paginationWrapper.append(s));
            this.checkPagination()
        },
        checkPagination: function() {
            var e = this;
            if (!1 === e.options.pagination)
                return !1;
            e.paginationWrapper.find(".owl-page").each(function() {
                t(this).data("owl-roundPages") === t(e.$owlItems[e.currentItem]).data("owl-roundPages") && (e.paginationWrapper.find(".owl-page").removeClass("active"),
                t(this).addClass("active"))
            })
        },
        checkNavigation: function() {
            if (!1 === this.options.navigation)
                return !1;
            !1 === this.options.rewindNav && (0 === this.currentItem && 0 === this.maximumItem ? (this.buttonPrev.addClass("disabled"),
            this.buttonNext.addClass("disabled")) : 0 === this.currentItem && 0 !== this.maximumItem ? (this.buttonPrev.addClass("disabled"),
            this.buttonNext.removeClass("disabled")) : this.currentItem === this.maximumItem ? (this.buttonPrev.removeClass("disabled"),
            this.buttonNext.addClass("disabled")) : 0 !== this.currentItem && this.currentItem !== this.maximumItem && (this.buttonPrev.removeClass("disabled"),
            this.buttonNext.removeClass("disabled")))
        },
        updateControls: function() {
            this.updatePagination(),
            this.checkNavigation(),
            this.owlControls && (this.options.items >= this.itemsAmount ? this.owlControls.hide() : this.owlControls.show())
        },
        destroyControls: function() {
            this.owlControls && this.owlControls.remove()
        },
        next: function(t) {
            if (this.isTransition)
                return !1;
            if (this.currentItem += !0 === this.options.scrollPerPage ? this.options.items : 1,
            this.currentItem > this.maximumItem + (!0 === this.options.scrollPerPage ? this.options.items - 1 : 0)) {
                if (!0 !== this.options.rewindNav)
                    return this.currentItem = this.maximumItem,
                    !1;
                this.currentItem = 0,
                t = "rewind"
            }
            this.goTo(this.currentItem, t)
        },
        prev: function(t) {
            if (this.isTransition)
                return !1;
            if (this.currentItem = !0 === this.options.scrollPerPage && 0 < this.currentItem && this.currentItem < this.options.items ? 0 : this.currentItem - (!0 === this.options.scrollPerPage ? this.options.items : 1),
            0 > this.currentItem) {
                if (!0 !== this.options.rewindNav)
                    return this.currentItem = 0,
                    !1;
                this.currentItem = this.maximumItem,
                t = "rewind"
            }
            this.goTo(this.currentItem, t)
        },
        goTo: function(t, i, n) {
            var o = this;
            return !o.isTransition && ("function" == typeof o.options.beforeMove && o.options.beforeMove.apply(this, [o.$elem]),
            t >= o.maximumItem ? t = o.maximumItem : 0 >= t && (t = 0),
            o.currentItem = o.owl.currentItem = t,
            !1 !== o.options.transitionStyle && "drag" !== n && 1 === o.options.items && !0 === o.browser.support3d ? (o.swapSpeed(0),
            !0 === o.browser.support3d ? o.transition3d(o.positionsInArray[t]) : o.css2slide(o.positionsInArray[t], 1),
            o.afterGo(),
            o.singleItemTransition(),
            !1) : (t = o.positionsInArray[t],
            !0 === o.browser.support3d ? (o.isCss3Finish = !1,
            !0 === i ? (o.swapSpeed("paginationSpeed"),
            e.setTimeout(function() {
                o.isCss3Finish = !0
            }, o.options.paginationSpeed)) : "rewind" === i ? (o.swapSpeed(o.options.rewindSpeed),
            e.setTimeout(function() {
                o.isCss3Finish = !0
            }, o.options.rewindSpeed)) : (o.swapSpeed("slideSpeed"),
            e.setTimeout(function() {
                o.isCss3Finish = !0
            }, o.options.slideSpeed)),
            o.transition3d(t)) : !0 === i ? o.css2slide(t, o.options.paginationSpeed) : "rewind" === i ? o.css2slide(t, o.options.rewindSpeed) : o.css2slide(t, o.options.slideSpeed),
            void o.afterGo()))
        },
        jumpTo: function(t) {
            "function" == typeof this.options.beforeMove && this.options.beforeMove.apply(this, [this.$elem]),
            t >= this.maximumItem || -1 === t ? t = this.maximumItem : 0 >= t && (t = 0),
            this.swapSpeed(0),
            !0 === this.browser.support3d ? this.transition3d(this.positionsInArray[t]) : this.css2slide(this.positionsInArray[t], 1),
            this.currentItem = this.owl.currentItem = t,
            this.afterGo()
        },
        afterGo: function() {
            this.prevArr.push(this.currentItem),
            this.prevItem = this.owl.prevItem = this.prevArr[this.prevArr.length - 2],
            this.prevArr.shift(0),
            this.prevItem !== this.currentItem && (this.checkPagination(),
            this.checkNavigation(),
            this.eachMoveUpdate(),
            !1 !== this.options.autoPlay && this.checkAp()),
            "function" == typeof this.options.afterMove && this.prevItem !== this.currentItem && this.options.afterMove.apply(this, [this.$elem])
        },
        stop: function() {
            this.apStatus = "stop",
            e.clearInterval(this.autoPlayInterval)
        },
        checkAp: function() {
            "stop" !== this.apStatus && this.play()
        },
        play: function() {
            var t = this;
            if (t.apStatus = "play",
            !1 === t.options.autoPlay)
                return !1;
            e.clearInterval(t.autoPlayInterval),
            t.autoPlayInterval = e.setInterval(function() {
                t.next(!0)
            }, t.options.autoPlay)
        },
        swapSpeed: function(t) {
            "slideSpeed" === t ? this.$owlWrapper.css(this.addCssSpeed(this.options.slideSpeed)) : "paginationSpeed" === t ? this.$owlWrapper.css(this.addCssSpeed(this.options.paginationSpeed)) : "string" != typeof t && this.$owlWrapper.css(this.addCssSpeed(t))
        },
        addCssSpeed: function(t) {
            return {
                "-webkit-transition": "all " + t + "ms ease",
                "-moz-transition": "all " + t + "ms ease",
                "-o-transition": "all " + t + "ms ease",
                transition: "all " + t + "ms ease"
            }
        },
        removeTransition: function() {
            return {
                "-webkit-transition": "",
                "-moz-transition": "",
                "-o-transition": "",
                transition: ""
            }
        },
        doTranslate: function(t) {
            return {
                "-webkit-transform": "translate3d(" + t + "px, 0px, 0px)",
                "-moz-transform": "translate3d(" + t + "px, 0px, 0px)",
                "-o-transform": "translate3d(" + t + "px, 0px, 0px)",
                "-ms-transform": "translate3d(" + t + "px, 0px, 0px)",
                transform: "translate3d(" + t + "px, 0px,0px)"
            }
        },
        transition3d: function(t) {
            this.$owlWrapper.css(this.doTranslate(t))
        },
        css2move: function(t) {
            this.$owlWrapper.css({
                left: t
            })
        },
        css2slide: function(t, e) {
            var i = this;
            i.isCssFinish = !1,
            i.$owlWrapper.stop(!0, !0).animate({
                left: t
            }, {
                duration: e || i.options.slideSpeed,
                complete: function() {
                    i.isCssFinish = !0
                }
            })
        },
        checkBrowser: function() {
            var t = i.createElement("div");
            t.style.cssText = "  -moz-transform:translate3d(0px, 0px, 0px); -ms-transform:translate3d(0px, 0px, 0px); -o-transform:translate3d(0px, 0px, 0px); -webkit-transform:translate3d(0px, 0px, 0px); transform:translate3d(0px, 0px, 0px)",
            t = t.style.cssText.match(/translate3d\(0px, 0px, 0px\)/g),
            this.browser = {
                support3d: null !== t && 1 === t.length,
                isTouch: "ontouchstart"in e || e.navigator.msMaxTouchPoints
            }
        },
        moveEvents: function() {
            !1 === this.options.mouseDrag && !1 === this.options.touchDrag || (this.gestures(),
            this.disabledEvents())
        },
        eventTypes: function() {
            var t = ["s", "e", "x"];
            this.ev_types = {},
            !0 === this.options.mouseDrag && !0 === this.options.touchDrag ? t = ["touchstart.owl mousedown.owl", "touchmove.owl mousemove.owl", "touchend.owl touchcancel.owl mouseup.owl"] : !1 === this.options.mouseDrag && !0 === this.options.touchDrag ? t = ["touchstart.owl", "touchmove.owl", "touchend.owl touchcancel.owl"] : !0 === this.options.mouseDrag && !1 === this.options.touchDrag && (t = ["mousedown.owl", "mousemove.owl", "mouseup.owl"]),
            this.ev_types.start = t[0],
            this.ev_types.move = t[1],
            this.ev_types.end = t[2]
        },
        disabledEvents: function() {
            this.$elem.on("dragstart.owl", function(t) {
                t.preventDefault()
            }),
            this.$elem.on("mousedown.disableTextSelect", function(e) {
                return t(e.target).is("input, textarea, select, option")
            })
        },
        gestures: function() {
            function n(t) {
                if (void 0 !== t.touches)
                    return {
                        x: t.touches[0].pageX,
                        y: t.touches[0].pageY
                    };
                if (void 0 === t.touches) {
                    if (void 0 !== t.pageX)
                        return {
                            x: t.pageX,
                            y: t.pageY
                        };
                    if (void 0 === t.pageX)
                        return {
                            x: t.clientX,
                            y: t.clientY
                        }
                }
            }
            function o(e) {
                "on" === e ? (t(i).on(a.ev_types.move, s),
                t(i).on(a.ev_types.end, r)) : "off" === e && (t(i).off(a.ev_types.move),
                t(i).off(a.ev_types.end))
            }
            function s(o) {
                o = o.originalEvent || o || e.event,
                a.newPosX = n(o).x - l.offsetX,
                a.newPosY = n(o).y - l.offsetY,
                a.newRelativeX = a.newPosX - l.relativePos,
                "function" == typeof a.options.startDragging && !0 !== l.dragging && 0 !== a.newRelativeX && (l.dragging = !0,
                a.options.startDragging.apply(a, [a.$elem])),
                (8 < a.newRelativeX || -8 > a.newRelativeX) && !0 === a.browser.isTouch && (void 0 !== o.preventDefault ? o.preventDefault() : o.returnValue = !1,
                l.sliding = !0),
                (10 < a.newPosY || -10 > a.newPosY) && !1 === l.sliding && t(i).off("touchmove.owl"),
                a.newPosX = Math.max(Math.min(a.newPosX, a.newRelativeX / 5), a.maximumPixels + a.newRelativeX / 5),
                !0 === a.browser.support3d ? a.transition3d(a.newPosX) : a.css2move(a.newPosX)
            }
            function r(i) {
                var n;
                (i = i.originalEvent || i || e.event).target = i.target || i.srcElement,
                l.dragging = !1,
                !0 !== a.browser.isTouch && a.$owlWrapper.removeClass("grabbing"),
                a.dragDirection = 0 > a.newRelativeX ? a.owl.dragDirection = "left" : a.owl.dragDirection = "right",
                0 !== a.newRelativeX && (n = a.getNewPosition(),
                a.goTo(n, !1, "drag"),
                l.targetElement === i.target && !0 !== a.browser.isTouch && (t(i.target).on("click.disable", function(e) {
                    e.stopImmediatePropagation(),
                    e.stopPropagation(),
                    e.preventDefault(),
                    t(e.target).off("click.disable")
                }),
                n = (i = t._data(i.target, "events").click).pop(),
                i.splice(0, 0, n))),
                o("off")
            }
            var a = this
              , l = {
                offsetX: 0,
                offsetY: 0,
                baseElWidth: 0,
                relativePos: 0,
                position: null,
                minSwipe: null,
                maxSwipe: null,
                sliding: null,
                dargging: null,
                targetElement: null
            };
            a.isCssFinish = !0,
            a.$elem.on(a.ev_types.start, ".owl-wrapper", function(i) {
                var s;
                if (3 === (i = i.originalEvent || i || e.event).which)
                    return !1;
                if (!(a.itemsAmount <= a.options.items)) {
                    if (!1 === a.isCssFinish && !a.options.dragBeforeAnimFinish || !1 === a.isCss3Finish && !a.options.dragBeforeAnimFinish)
                        return !1;
                    !1 !== a.options.autoPlay && e.clearInterval(a.autoPlayInterval),
                    !0 === a.browser.isTouch || a.$owlWrapper.hasClass("grabbing") || a.$owlWrapper.addClass("grabbing"),
                    a.newPosX = 0,
                    a.newRelativeX = 0,
                    t(this).css(a.removeTransition()),
                    s = t(this).position(),
                    l.relativePos = s.left,
                    l.offsetX = n(i).x - s.left,
                    l.offsetY = n(i).y - s.top,
                    o("on"),
                    l.sliding = !1,
                    l.targetElement = i.target || i.srcElement
                }
            })
        },
        getNewPosition: function() {
            var t = this.closestItem();
            return t > this.maximumItem ? t = this.currentItem = this.maximumItem : 0 <= this.newPosX && (this.currentItem = t = 0),
            t
        },
        closestItem: function() {
            var e = this
              , i = !0 === e.options.scrollPerPage ? e.pagesInArray : e.positionsInArray
              , n = e.newPosX
              , o = null;
            return t.each(i, function(s, r) {
                n - e.itemWidth / 20 > i[s + 1] && n - e.itemWidth / 20 < r && "left" === e.moveDirection() ? (o = r,
                e.currentItem = !0 === e.options.scrollPerPage ? t.inArray(o, e.positionsInArray) : s) : n + e.itemWidth / 20 < r && n + e.itemWidth / 20 > (i[s + 1] || i[s] - e.itemWidth) && "right" === e.moveDirection() && (!0 === e.options.scrollPerPage ? (o = i[s + 1] || i[i.length - 1],
                e.currentItem = t.inArray(o, e.positionsInArray)) : (o = i[s + 1],
                e.currentItem = s + 1))
            }),
            e.currentItem
        },
        moveDirection: function() {
            var t;
            return 0 > this.newRelativeX ? (t = "right",
            this.playDirection = "next") : (t = "left",
            this.playDirection = "prev"),
            t
        },
        customEvents: function() {
            var t = this;
            t.$elem.on("owl.next", function() {
                t.next()
            }),
            t.$elem.on("owl.prev", function() {
                t.prev()
            }),
            t.$elem.on("owl.play", function(e, i) {
                t.options.autoPlay = i,
                t.play(),
                t.hoverStatus = "play"
            }),
            t.$elem.on("owl.stop", function() {
                t.stop(),
                t.hoverStatus = "stop"
            }),
            t.$elem.on("owl.goTo", function(e, i) {
                t.goTo(i)
            }),
            t.$elem.on("owl.jumpTo", function(e, i) {
                t.jumpTo(i)
            })
        },
        stopOnHover: function() {
            var t = this;
            !0 === t.options.stopOnHover && !0 !== t.browser.isTouch && !1 !== t.options.autoPlay && (t.$elem.on("mouseover", function() {
                t.stop()
            }),
            t.$elem.on("mouseout", function() {
                "stop" !== t.hoverStatus && t.play()
            }))
        },
        lazyLoad: function() {
            var e, i, n, o;
            if (!1 === this.options.lazyLoad)
                return !1;
            for (e = 0; e < this.itemsAmount; e += 1)
                "loaded" !== (i = t(this.$owlItems[e])).data("owl-loaded") && (n = i.data("owl-item"),
                "string" != typeof (o = i.find(".lazyOwl")).data("src") ? i.data("owl-loaded", "loaded") : (void 0 === i.data("owl-loaded") && (o.hide(),
                i.addClass("loading").data("owl-loaded", "checked")),
                (!0 !== this.options.lazyFollow || n >= this.currentItem) && n < this.currentItem + this.options.items && o.length && this.lazyPreload(i, o)))
        },
        lazyPreload: function(t, i) {
            function n() {
                t.data("owl-loaded", "loaded").removeClass("loading"),
                i.removeAttr("data-src"),
                "fade" === s.options.lazyEffect ? i.fadeIn(400) : i.show(),
                "function" == typeof s.options.afterLazyLoad && s.options.afterLazyLoad.apply(this, [s.$elem])
            }
            var o, s = this, r = 0;
            "DIV" === i.prop("tagName") ? (i.css("background-image", "url(" + i.data("src") + ")"),
            o = !0) : i[0].src = i.data("src"),
            function t() {
                r += 1,
                s.completeImg(i.get(0)) || !0 === o ? n() : 100 >= r ? e.setTimeout(t, 100) : n()
            }()
        },
        autoHeight: function() {
            function i() {
                var i = t(o.$owlItems[o.currentItem]).height();
                o.wrapperOuter.css("height", i + "px"),
                o.wrapperOuter.hasClass("autoHeight") || e.setTimeout(function() {
                    o.wrapperOuter.addClass("autoHeight")
                }, 0)
            }
            var n, o = this, s = t(o.$owlItems[o.currentItem]).find("img");
            void 0 !== s.get(0) ? (n = 0,
            function t() {
                n += 1,
                o.completeImg(s.get(0)) ? i() : 100 >= n ? e.setTimeout(t, 100) : o.wrapperOuter.css("height", "")
            }()) : i()
        },
        completeImg: function(t) {
            return !(!t.complete || void 0 !== t.naturalWidth && 0 === t.naturalWidth)
        },
        onVisibleItems: function() {
            var e;
            for (!0 === this.options.addClassActive && this.$owlItems.removeClass("active"),
            this.visibleItems = [],
            e = this.currentItem; e < this.currentItem + this.options.items; e += 1)
                this.visibleItems.push(e),
                !0 === this.options.addClassActive && t(this.$owlItems[e]).addClass("active");
            this.owl.visibleItems = this.visibleItems
        },
        transitionTypes: function(t) {
            this.outClass = "owl-" + t + "-out",
            this.inClass = "owl-" + t + "-in"
        },
        singleItemTransition: function() {
            var t = this
              , e = t.outClass
              , i = t.inClass
              , n = t.$owlItems.eq(t.currentItem)
              , o = t.$owlItems.eq(t.prevItem)
              , s = Math.abs(t.positionsInArray[t.currentItem]) + t.positionsInArray[t.prevItem]
              , r = Math.abs(t.positionsInArray[t.currentItem]) + t.itemWidth / 2;
            t.isTransition = !0,
            t.$owlWrapper.addClass("owl-origin").css({
                "-webkit-transform-origin": r + "px",
                "-moz-perspective-origin": r + "px",
                "perspective-origin": r + "px"
            }),
            o.css({
                position: "relative",
                left: s + "px"
            }).addClass(e).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend", function() {
                t.endPrev = !0,
                o.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend"),
                t.clearTransStyle(o, e)
            }),
            n.addClass(i).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend", function() {
                t.endCurrent = !0,
                n.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend"),
                t.clearTransStyle(n, i)
            })
        },
        clearTransStyle: function(t, e) {
            t.css({
                position: "",
                left: ""
            }).removeClass(e),
            this.endPrev && this.endCurrent && (this.$owlWrapper.removeClass("owl-origin"),
            this.isTransition = this.endCurrent = this.endPrev = !1)
        },
        owlStatus: function() {
            this.owl = {
                userOptions: this.userOptions,
                baseElement: this.$elem,
                userItems: this.$userItems,
                owlItems: this.$owlItems,
                currentItem: this.currentItem,
                prevItem: this.prevItem,
                visibleItems: this.visibleItems,
                isTouch: this.browser.isTouch,
                browser: this.browser,
                dragDirection: this.dragDirection
            }
        },
        clearEvents: function() {
            this.$elem.off(".owl owl mousedown.disableTextSelect"),
            t(i).off(".owl owl"),
            t(e).off("resize", this.resizer)
        },
        unWrap: function() {
            0 !== this.$elem.children().length && (this.$owlWrapper.unwrap(),
            this.$userItems.unwrap().unwrap(),
            this.owlControls && this.owlControls.remove()),
            this.clearEvents(),
            this.$elem.attr("style", this.$elem.data("owl-originalStyles") || "").attr("class", this.$elem.data("owl-originalClasses"))
        },
        destroy: function() {
            this.stop(),
            e.clearInterval(this.checkVisible),
            this.unWrap(),
            this.$elem.removeData()
        },
        reinit: function(e) {
            e = t.extend({}, this.userOptions, e),
            this.unWrap(),
            this.init(e, this.$elem)
        },
        addItem: function(t, e) {
            var i;
            return !!t && (0 === this.$elem.children().length ? (this.$elem.append(t),
            this.setVars(),
            !1) : (this.unWrap(),
            (i = void 0 === e || -1 === e ? -1 : e) >= this.$userItems.length || -1 === i ? this.$userItems.eq(-1).after(t) : this.$userItems.eq(i).before(t),
            void this.setVars()))
        },
        removeItem: function(t) {
            if (0 === this.$elem.children().length)
                return !1;
            t = void 0 === t || -1 === t ? -1 : t,
            this.unWrap(),
            this.$userItems.eq(t).remove(),
            this.setVars()
        }
    };
    t.fn.owlCarousel = function(e) {
        return this.each(function() {
            if (!0 === t(this).data("owl-init"))
                return !1;
            t(this).data("owl-init", !0);
            var i = Object.create(n);
            i.init(e, this),
            t.data(this, "owlCarousel", i)
        })
    }
    ,
    t.fn.owlCarousel.options = {
        items: 5,
        itemsCustom: !1,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 2],
        itemsTabletSmall: !1,
        itemsMobile: [479, 1],
        singleItem: !1,
        itemsScaleUp: !1,
        slideSpeed: 200,
        paginationSpeed: 800,
        rewindSpeed: 1e3,
        autoPlay: !1,
        stopOnHover: !1,
        navigation: !1,
        navigationText: ["prev", "next"],
        rewindNav: !0,
        scrollPerPage: !1,
        pagination: !0,
        paginationNumbers: !1,
        responsive: !0,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: e,
        baseClass: "owl-carousel",
        theme: "owl-theme",
        lazyLoad: !1,
        lazyFollow: !0,
        lazyEffect: "fade",
        autoHeight: !1,
        jsonPath: !1,
        jsonSuccess: !1,
        dragBeforeAnimFinish: !0,
        mouseDrag: !0,
        touchDrag: !0,
        addClassActive: !1,
        transitionStyle: !1,
        beforeUpdate: !1,
        afterUpdate: !1,
        beforeInit: !1,
        afterInit: !1,
        beforeMove: !1,
        afterMove: !1,
        afterAction: !1,
        startDragging: !1,
        afterLazyLoad: !1
    }
}(jQuery, window, document),
function(t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : t("object" == typeof exports ? require("jquery") : window.jQuery || window.Zepto)
}(function(t) {
    var e, i, n, o, s, r, a = "Close", l = "BeforeClose", c = "MarkupParse", d = "Open", p = "Change", u = "mfp", h = "." + u, f = "mfp-ready", m = "mfp-removing", g = "mfp-prevent-close", v = function() {}, y = !!window.jQuery, b = t(window), w = function(t, i) {
        e.ev.on(u + t + h, i)
    }, x = function(e, i, n, o) {
        var s = document.createElement("div");
        return s.className = "mfp-" + e,
        n && (s.innerHTML = n),
        o ? i && i.appendChild(s) : (s = t(s),
        i && s.appendTo(i)),
        s
    }, T = function(i, n) {
        e.ev.triggerHandler(u + i, n),
        e.st.callbacks && (i = i.charAt(0).toLowerCase() + i.slice(1),
        e.st.callbacks[i] && e.st.callbacks[i].apply(e, t.isArray(n) ? n : [n]))
    }, k = function(i) {
        return i === r && e.currTemplate.closeBtn || (e.currTemplate.closeBtn = t(e.st.closeMarkup.replace("%title%", e.st.tClose)),
        r = i),
        e.currTemplate.closeBtn
    }, C = function() {
        t.magnificPopup.instance || ((e = new v).init(),
        t.magnificPopup.instance = e)
    };
    v.prototype = {
        constructor: v,
        init: function() {
            var i = navigator.appVersion;
            e.isIE7 = -1 !== i.indexOf("MSIE 7."),
            e.isIE8 = -1 !== i.indexOf("MSIE 8."),
            e.isLowIE = e.isIE7 || e.isIE8,
            e.isAndroid = /android/gi.test(i),
            e.isIOS = /iphone|ipad|ipod/gi.test(i),
            e.supportsTransition = function() {
                var t = document.createElement("p").style
                  , e = ["ms", "O", "Moz", "Webkit"];
                if (void 0 !== t.transition)
                    return !0;
                for (; e.length; )
                    if (e.pop() + "Transition"in t)
                        return !0;
                return !1
            }(),
            e.probablyMobile = e.isAndroid || e.isIOS || /(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent),
            n = t(document),
            e.popupsCache = {}
        },
        open: function(i) {
            var o;
            if (!1 === i.isObj) {
                e.items = i.items.toArray(),
                e.index = 0;
                var r, a = i.items;
                for (o = 0; o < a.length; o++)
                    if ((r = a[o]).parsed && (r = r.el[0]),
                    r === i.el[0]) {
                        e.index = o;
                        break
                    }
            } else
                e.items = t.isArray(i.items) ? i.items : [i.items],
                e.index = i.index || 0;
            if (!e.isOpen) {
                e.types = [],
                s = "",
                e.ev = i.mainEl && i.mainEl.length ? i.mainEl.eq(0) : n,
                i.key ? (e.popupsCache[i.key] || (e.popupsCache[i.key] = {}),
                e.currTemplate = e.popupsCache[i.key]) : e.currTemplate = {},
                e.st = t.extend(!0, {}, t.magnificPopup.defaults, i),
                e.fixedContentPos = "auto" === e.st.fixedContentPos ? !e.probablyMobile : e.st.fixedContentPos,
                e.st.modal && (e.st.closeOnContentClick = !1,
                e.st.closeOnBgClick = !1,
                e.st.showCloseBtn = !1,
                e.st.enableEscapeKey = !1),
                e.bgOverlay || (e.bgOverlay = x("bg").on("click" + h, function() {
                    e.close()
                }),
                e.wrap = x("wrap").attr("tabindex", -1).on("click" + h, function(t) {
                    e._checkIfClose(t.target) && e.close()
                }),
                e.container = x("container", e.wrap)),
                e.contentContainer = x("content"),
                e.st.preloader && (e.preloader = x("preloader", e.container, e.st.tLoading));
                var l = t.magnificPopup.modules;
                for (o = 0; o < l.length; o++) {
                    var p = l[o];
                    p = p.charAt(0).toUpperCase() + p.slice(1),
                    e["init" + p].call(e)
                }
                T("BeforeOpen"),
                e.st.showCloseBtn && (e.st.closeBtnInside ? (w(c, function(t, e, i, n) {
                    i.close_replaceWith = k(n.type)
                }),
                s += " mfp-close-btn-in") : e.wrap.append(k())),
                e.st.alignTop && (s += " mfp-align-top"),
                e.wrap.css(e.fixedContentPos ? {
                    overflow: e.st.overflowY,
                    overflowX: "hidden",
                    overflowY: e.st.overflowY
                } : {
                    top: b.scrollTop(),
                    position: "absolute"
                }),
                (!1 === e.st.fixedBgPos || "auto" === e.st.fixedBgPos && !e.fixedContentPos) && e.bgOverlay.css({
                    height: n.height(),
                    position: "absolute"
                }),
                e.st.enableEscapeKey && n.on("keyup" + h, function(t) {
                    27 === t.keyCode && e.close()
                }),
                b.on("resize" + h, function() {
                    e.updateSize()
                }),
                e.st.closeOnContentClick || (s += " mfp-auto-cursor"),
                s && e.wrap.addClass(s);
                var u = e.wH = b.height()
                  , m = {};
                if (e.fixedContentPos && e._hasScrollBar(u)) {
                    var g = e._getScrollbarSize();
                    g && (m.marginRight = g)
                }
                e.fixedContentPos && (e.isIE7 ? t("body, html").css("overflow", "hidden") : m.overflow = "hidden");
                var v = e.st.mainClass;
                return e.isIE7 && (v += " mfp-ie7"),
                v && e._addClassToMFP(v),
                e.updateItemHTML(),
                T("BuildControls"),
                t("html").css(m),
                e.bgOverlay.add(e.wrap).prependTo(e.st.prependTo || t(document.body)),
                e._lastFocusedEl = document.activeElement,
                setTimeout(function() {
                    e.content ? (e._addClassToMFP(f),
                    e._setFocus()) : e.bgOverlay.addClass(f),
                    n.on("focusin" + h, e._onFocusIn)
                }, 16),
                e.isOpen = !0,
                e.updateSize(u),
                T(d),
                i
            }
            e.updateItemHTML()
        },
        close: function() {
            e.isOpen && (T(l),
            e.isOpen = !1,
            e.st.removalDelay && !e.isLowIE && e.supportsTransition ? (e._addClassToMFP(m),
            setTimeout(function() {
                e._close()
            }, e.st.removalDelay)) : e._close())
        },
        _close: function() {
            T(a);
            var i = m + " " + f + " ";
            if (e.bgOverlay.detach(),
            e.wrap.detach(),
            e.container.empty(),
            e.st.mainClass && (i += e.st.mainClass + " "),
            e._removeClassFromMFP(i),
            e.fixedContentPos) {
                var o = {
                    marginRight: ""
                };
                e.isIE7 ? t("body, html").css("overflow", "") : o.overflow = "",
                t("html").css(o)
            }
            n.off("keyup.mfp focusin" + h),
            e.ev.off(h),
            e.wrap.attr("class", "mfp-wrap").removeAttr("style"),
            e.bgOverlay.attr("class", "mfp-bg"),
            e.container.attr("class", "mfp-container"),
            !e.st.showCloseBtn || e.st.closeBtnInside && !0 !== e.currTemplate[e.currItem.type] || e.currTemplate.closeBtn && e.currTemplate.closeBtn.detach(),
            e._lastFocusedEl && t(e._lastFocusedEl).focus(),
            e.currItem = null,
            e.content = null,
            e.currTemplate = null,
            e.prevHeight = 0,
            T("AfterClose")
        },
        updateSize: function(t) {
            if (e.isIOS) {
                var i = document.documentElement.clientWidth / window.innerWidth
                  , n = window.innerHeight * i;
                e.wrap.css("height", n),
                e.wH = n
            } else
                e.wH = t || b.height();
            e.fixedContentPos || e.wrap.css("height", e.wH),
            T("Resize")
        },
        updateItemHTML: function() {
            var i = e.items[e.index];
            e.contentContainer.detach(),
            e.content && e.content.detach(),
            i.parsed || (i = e.parseEl(e.index));
            var n = i.type;
            if (T("BeforeChange", [e.currItem ? e.currItem.type : "", n]),
            e.currItem = i,
            !e.currTemplate[n]) {
                var s = !!e.st[n] && e.st[n].markup;
                T("FirstMarkupParse", s),
                e.currTemplate[n] = !s || t(s)
            }
            o && o !== i.type && e.container.removeClass("mfp-" + o + "-holder");
            var r = e["get" + n.charAt(0).toUpperCase() + n.slice(1)](i, e.currTemplate[n]);
            e.appendContent(r, n),
            i.preloaded = !0,
            T(p, i),
            o = i.type,
            e.container.prepend(e.contentContainer),
            T("AfterChange")
        },
        appendContent: function(t, i) {
            e.content = t,
            t ? e.st.showCloseBtn && e.st.closeBtnInside && !0 === e.currTemplate[i] ? e.content.find(".mfp-close").length || e.content.append(k()) : e.content = t : e.content = "",
            T("BeforeAppend"),
            e.container.addClass("mfp-" + i + "-holder"),
            e.contentContainer.append(e.content)
        },
        parseEl: function(i) {
            var n, o = e.items[i];
            if (o.tagName ? o = {
                el: t(o)
            } : (n = o.type,
            o = {
                data: o,
                src: o.src
            }),
            o.el) {
                for (var s = e.types, r = 0; r < s.length; r++)
                    if (o.el.hasClass("mfp-" + s[r])) {
                        n = s[r];
                        break
                    }
                o.src = o.el.attr("data-mfp-src"),
                o.src || (o.src = o.el.attr("href"))
            }
            return o.type = n || e.st.type || "inline",
            o.index = i,
            o.parsed = !0,
            e.items[i] = o,
            T("ElementParse", o),
            e.items[i]
        },
        addGroup: function(t, i) {
            var n = function(n) {
                n.mfpEl = this,
                e._openClick(n, t, i)
            };
            i || (i = {});
            var o = "click.magnificPopup";
            i.mainEl = t,
            i.items ? (i.isObj = !0,
            t.off(o).on(o, n)) : (i.isObj = !1,
            i.delegate ? t.off(o).on(o, i.delegate, n) : (i.items = t,
            t.off(o).on(o, n)))
        },
        _openClick: function(i, n, o) {
            if ((void 0 !== o.midClick ? o.midClick : t.magnificPopup.defaults.midClick) || 2 !== i.which && !i.ctrlKey && !i.metaKey) {
                var s = void 0 !== o.disableOn ? o.disableOn : t.magnificPopup.defaults.disableOn;
                if (s)
                    if (t.isFunction(s)) {
                        if (!s.call(e))
                            return !0
                    } else if (b.width() < s)
                        return !0;
                i.type && (i.preventDefault(),
                e.isOpen && i.stopPropagation()),
                o.el = t(i.mfpEl),
                o.delegate && (o.items = n.find(o.delegate)),
                e.open(o)
            }
        },
        updateStatus: function(t, n) {
            if (e.preloader) {
                i !== t && e.container.removeClass("mfp-s-" + i),
                n || "loading" !== t || (n = e.st.tLoading);
                var o = {
                    status: t,
                    text: n
                };
                T("UpdateStatus", o),
                t = o.status,
                n = o.text,
                e.preloader.html(n),
                e.preloader.find("a").on("click", function(t) {
                    t.stopImmediatePropagation()
                }),
                e.container.addClass("mfp-s-" + t),
                i = t
            }
        },
        _checkIfClose: function(i) {
            if (!t(i).hasClass(g)) {
                var n = e.st.closeOnContentClick
                  , o = e.st.closeOnBgClick;
                if (n && o)
                    return !0;
                if (!e.content || t(i).hasClass("mfp-close") || e.preloader && i === e.preloader[0])
                    return !0;
                if (i === e.content[0] || t.contains(e.content[0], i)) {
                    if (n)
                        return !0
                } else if (o && t.contains(document, i))
                    return !0;
                return !1
            }
        },
        _addClassToMFP: function(t) {
            e.bgOverlay.addClass(t),
            e.wrap.addClass(t)
        },
        _removeClassFromMFP: function(t) {
            this.bgOverlay.removeClass(t),
            e.wrap.removeClass(t)
        },
        _hasScrollBar: function(t) {
            return (e.isIE7 ? n.height() : document.body.scrollHeight) > (t || b.height())
        },
        _setFocus: function() {
            (e.st.focus ? e.content.find(e.st.focus).eq(0) : e.wrap).focus()
        },
        _onFocusIn: function(i) {
            return i.target === e.wrap[0] || t.contains(e.wrap[0], i.target) ? void 0 : (e._setFocus(),
            !1)
        },
        _parseMarkup: function(e, i, n) {
            var o;
            n.data && (i = t.extend(n.data, i)),
            T(c, [e, i, n]),
            t.each(i, function(t, i) {
                if (void 0 === i || !1 === i)
                    return !0;
                if ((o = t.split("_")).length > 1) {
                    var n = e.find(h + "-" + o[0]);
                    if (n.length > 0) {
                        var s = o[1];
                        "replaceWith" === s ? n[0] !== i[0] && n.replaceWith(i) : "img" === s ? n.is("img") ? n.attr("src", i) : n.replaceWith('<img src="' + i + '" class="' + n.attr("class") + '" />') : n.attr(o[1], i)
                    }
                } else
                    e.find(h + "-" + t).html(i)
            })
        },
        _getScrollbarSize: function() {
            if (void 0 === e.scrollbarSize) {
                var t = document.createElement("div");
                t.style.cssText = "width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;",
                document.body.appendChild(t),
                e.scrollbarSize = t.offsetWidth - t.clientWidth,
                document.body.removeChild(t)
            }
            return e.scrollbarSize
        }
    },
    t.magnificPopup = {
        instance: null,
        proto: v.prototype,
        modules: [],
        open: function(e, i) {
            return C(),
            (e = e ? t.extend(!0, {}, e) : {}).isObj = !0,
            e.index = i || 0,
            this.instance.open(e)
        },
        close: function() {
            return t.magnificPopup.instance && t.magnificPopup.instance.close()
        },
        registerModule: function(e, i) {
            i.options && (t.magnificPopup.defaults[e] = i.options),
            t.extend(this.proto, i.proto),
            this.modules.push(e)
        },
        defaults: {
            disableOn: 0,
            key: null,
            midClick: !1,
            mainClass: "",
            preloader: !0,
            focus: "",
            closeOnContentClick: !1,
            closeOnBgClick: !0,
            closeBtnInside: !0,
            showCloseBtn: !0,
            enableEscapeKey: !0,
            modal: !1,
            alignTop: !1,
            removalDelay: 0,
            prependTo: null,
            fixedContentPos: "auto",
            fixedBgPos: "auto",
            overflowY: "auto",
            closeMarkup: '<button title="%title%" type="button" class="mfp-close">&times;</button>',
            tClose: "Close (Esc)",
            tLoading: "Loading..."
        }
    },
    t.fn.magnificPopup = function(i) {
        C();
        var n = t(this);
        if ("string" == typeof i)
            if ("open" === i) {
                var o, s = y ? n.data("magnificPopup") : n[0].magnificPopup, r = parseInt(arguments[1], 10) || 0;
                s.items ? o = s.items[r] : (o = n,
                s.delegate && (o = o.find(s.delegate)),
                o = o.eq(r)),
                e._openClick({
                    mfpEl: o
                }, n, s)
            } else
                e.isOpen && e[i].apply(e, Array.prototype.slice.call(arguments, 1));
        else
            i = t.extend(!0, {}, i),
            y ? n.data("magnificPopup", i) : n[0].magnificPopup = i,
            e.addGroup(n, i);
        return n
    }
    ;
    var S, $, E, I = "inline", A = function() {
        E && ($.after(E.addClass(S)).detach(),
        E = null)
    };
    t.magnificPopup.registerModule(I, {
        options: {
            hiddenClass: "hide",
            markup: "",
            tNotFound: "Content not found"
        },
        proto: {
            initInline: function() {
                e.types.push(I),
                w(a + "." + I, function() {
                    A()
                })
            },
            getInline: function(i, n) {
                if (A(),
                i.src) {
                    var o = e.st.inline
                      , s = t(i.src);
                    if (s.length) {
                        var r = s[0].parentNode;
                        r && r.tagName && ($ || (S = o.hiddenClass,
                        $ = x(S),
                        S = "mfp-" + S),
                        E = s.after($).detach().removeClass(S)),
                        e.updateStatus("ready")
                    } else
                        e.updateStatus("error", o.tNotFound),
                        s = t("<div>");
                    return i.inlineElement = s,
                    s
                }
                return e.updateStatus("ready"),
                e._parseMarkup(n, {}, i),
                n
            }
        }
    });
    var _, N = "ajax", P = function() {
        _ && t(document.body).removeClass(_)
    }, D = function() {
        P(),
        e.req && e.req.abort()
    };
    t.magnificPopup.registerModule(N, {
        options: {
            settings: null,
            cursor: "mfp-ajax-cur",
            tError: '<a href="%url%">The content</a> could not be loaded.'
        },
        proto: {
            initAjax: function() {
                e.types.push(N),
                _ = e.st.ajax.cursor,
                w(a + "." + N, D),
                w("BeforeChange." + N, D)
            },
            getAjax: function(i) {
                _ && t(document.body).addClass(_),
                e.updateStatus("loading");
                var n = t.extend({
                    url: i.src,
                    success: function(n, o, s) {
                        var r = {
                            data: n,
                            xhr: s
                        };
                        T("ParseAjax", r),
                        e.appendContent(t(r.data), N),
                        i.finished = !0,
                        P(),
                        e._setFocus(),
                        setTimeout(function() {
                            e.wrap.addClass(f)
                        }, 16),
                        e.updateStatus("ready"),
                        T("AjaxContentAdded")
                    },
                    error: function() {
                        P(),
                        i.finished = i.loadError = !0,
                        e.updateStatus("error", e.st.ajax.tError.replace("%url%", i.src))
                    }
                }, e.st.ajax.settings);
                return e.req = t.ajax(n),
                ""
            }
        }
    });
    var O, j = function(i) {
        if (i.data && void 0 !== i.data.title)
            return i.data.title;
        var n = e.st.image.titleSrc;
        if (n) {
            if (t.isFunction(n))
                return n.call(e, i);
            if (i.el)
                return i.el.attr(n) || ""
        }
        return ""
    };
    t.magnificPopup.registerModule("image", {
        options: {
            markup: '<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>',
            cursor: "mfp-zoom-out-cur",
            titleSrc: "title",
            verticalFit: !0,
            tError: '<a href="%url%">The image</a> could not be loaded.'
        },
        proto: {
            initImage: function() {
                var i = e.st.image
                  , n = ".image";
                e.types.push("image"),
                w(d + n, function() {
                    "image" === e.currItem.type && i.cursor && t(document.body).addClass(i.cursor)
                }),
                w(a + n, function() {
                    i.cursor && t(document.body).removeClass(i.cursor),
                    b.off("resize" + h)
                }),
                w("Resize" + n, e.resizeImage),
                e.isLowIE && w("AfterChange", e.resizeImage)
            },
            resizeImage: function() {
                var t = e.currItem;
                if (t && t.img && e.st.image.verticalFit) {
                    var i = 0;
                    e.isLowIE && (i = parseInt(t.img.css("padding-top"), 10) + parseInt(t.img.css("padding-bottom"), 10)),
                    t.img.css("max-height", e.wH - i)
                }
            },
            _onImageHasSize: function(t) {
                t.img && (t.hasSize = !0,
                O && clearInterval(O),
                t.isCheckingImgSize = !1,
                T("ImageHasSize", t),
                t.imgHidden && (e.content && e.content.removeClass("mfp-loading"),
                t.imgHidden = !1))
            },
            findImageSize: function(t) {
                var i = 0
                  , n = t.img[0]
                  , o = function(s) {
                    O && clearInterval(O),
                    O = setInterval(function() {
                        return n.naturalWidth > 0 ? void e._onImageHasSize(t) : (i > 200 && clearInterval(O),
                        void (3 === ++i ? o(10) : 40 === i ? o(50) : 100 === i && o(500)))
                    }, s)
                };
                o(1)
            },
            getImage: function(i, n) {
                var o = 0
                  , s = function() {
                    i && (i.img[0].complete ? (i.img.off(".mfploader"),
                    i === e.currItem && (e._onImageHasSize(i),
                    e.updateStatus("ready")),
                    i.hasSize = !0,
                    i.loaded = !0,
                    T("ImageLoadComplete")) : 200 > ++o ? setTimeout(s, 100) : r())
                }
                  , r = function() {
                    i && (i.img.off(".mfploader"),
                    i === e.currItem && (e._onImageHasSize(i),
                    e.updateStatus("error", a.tError.replace("%url%", i.src))),
                    i.hasSize = !0,
                    i.loaded = !0,
                    i.loadError = !0)
                }
                  , a = e.st.image
                  , l = n.find(".mfp-img");
                if (l.length) {
                    var c = document.createElement("img");
                    c.className = "mfp-img",
                    i.el && i.el.find("img").length && (c.alt = i.el.find("img").attr("alt")),
                    i.img = t(c).on("load.mfploader", s).on("error.mfploader", r),
                    c.src = i.src,
                    l.is("img") && (i.img = i.img.clone()),
                    (c = i.img[0]).naturalWidth > 0 ? i.hasSize = !0 : c.width || (i.hasSize = !1)
                }
                return e._parseMarkup(n, {
                    title: j(i),
                    img_replaceWith: i.img
                }, i),
                e.resizeImage(),
                i.hasSize ? (O && clearInterval(O),
                i.loadError ? (n.addClass("mfp-loading"),
                e.updateStatus("error", a.tError.replace("%url%", i.src))) : (n.removeClass("mfp-loading"),
                e.updateStatus("ready")),
                n) : (e.updateStatus("loading"),
                i.loading = !0,
                i.hasSize || (i.imgHidden = !0,
                n.addClass("mfp-loading"),
                e.findImageSize(i)),
                n)
            }
        }
    });
    var L;
    t.magnificPopup.registerModule("zoom", {
        options: {
            enabled: !1,
            easing: "ease-in-out",
            duration: 300,
            opener: function(t) {
                return t.is("img") ? t : t.find("img")
            }
        },
        proto: {
            initZoom: function() {
                var t, i = e.st.zoom, n = ".zoom";
                if (i.enabled && e.supportsTransition) {
                    var o, s, r = i.duration, c = function(t) {
                        var e = t.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image")
                          , n = "all " + i.duration / 1e3 + "s " + i.easing
                          , o = {
                            position: "fixed",
                            zIndex: 9999,
                            left: 0,
                            top: 0,
                            "-webkit-backface-visibility": "hidden"
                        }
                          , s = "transition";
                        return o["-webkit-" + s] = o["-moz-" + s] = o["-o-" + s] = o[s] = n,
                        e.css(o),
                        e
                    }, d = function() {
                        e.content.css("visibility", "visible")
                    };
                    w("BuildControls" + n, function() {
                        if (e._allowZoom()) {
                            if (clearTimeout(o),
                            e.content.css("visibility", "hidden"),
                            !(t = e._getItemToZoom()))
                                return void d();
                            (s = c(t)).css(e._getOffset()),
                            e.wrap.append(s),
                            o = setTimeout(function() {
                                s.css(e._getOffset(!0)),
                                o = setTimeout(function() {
                                    d(),
                                    setTimeout(function() {
                                        s.remove(),
                                        t = s = null,
                                        T("ZoomAnimationEnded")
                                    }, 16)
                                }, r)
                            }, 16)
                        }
                    }),
                    w(l + n, function() {
                        if (e._allowZoom()) {
                            if (clearTimeout(o),
                            e.st.removalDelay = r,
                            !t) {
                                if (!(t = e._getItemToZoom()))
                                    return;
                                s = c(t)
                            }
                            s.css(e._getOffset(!0)),
                            e.wrap.append(s),
                            e.content.css("visibility", "hidden"),
                            setTimeout(function() {
                                s.css(e._getOffset())
                            }, 16)
                        }
                    }),
                    w(a + n, function() {
                        e._allowZoom() && (d(),
                        s && s.remove(),
                        t = null)
                    })
                }
            },
            _allowZoom: function() {
                return "image" === e.currItem.type
            },
            _getItemToZoom: function() {
                return !!e.currItem.hasSize && e.currItem.img
            },
            _getOffset: function(i) {
                var n, o = (n = i ? e.currItem.img : e.st.zoom.opener(e.currItem.el || e.currItem)).offset(), s = parseInt(n.css("padding-top"), 10), r = parseInt(n.css("padding-bottom"), 10);
                o.top -= t(window).scrollTop() - s;
                var a = {
                    width: n.width(),
                    height: (y ? n.innerHeight() : n[0].offsetHeight) - r - s
                };
                return void 0 === L && (L = void 0 !== document.createElement("p").style.MozTransform),
                L ? a["-moz-transform"] = a.transform = "translate(" + o.left + "px," + o.top + "px)" : (a.left = o.left,
                a.top = o.top),
                a
            }
        }
    });
    var H = "iframe"
      , M = function(t) {
        if (e.currTemplate[H]) {
            var i = e.currTemplate[H].find("iframe");
            i.length && (t || (i[0].src = "//about:blank"),
            e.isIE8 && i.css("display", t ? "block" : "none"))
        }
    };
    t.magnificPopup.registerModule(H, {
        options: {
            markup: '<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',
            srcAction: "iframe_src",
            patterns: {
                youtube: {
                    index: "youtube.com",
                    id: "v=",
                    src: "//www.youtube.com/embed/%id%?autoplay=1"
                },
                vimeo: {
                    index: "vimeo.com/",
                    id: "/",
                    src: "//player.vimeo.com/video/%id%?autoplay=1"
                },
                gmaps: {
                    index: "//maps.google.",
                    src: "%id%&output=embed"
                }
            }
        },
        proto: {
            initIframe: function() {
                e.types.push(H),
                w("BeforeChange", function(t, e, i) {
                    e !== i && (e === H ? M() : i === H && M(!0))
                }),
                w(a + "." + H, function() {
                    M()
                })
            },
            getIframe: function(i, n) {
                var o = i.src
                  , s = e.st.iframe;
                t.each(s.patterns, function() {
                    return o.indexOf(this.index) > -1 ? (this.id && (o = "string" == typeof this.id ? o.substr(o.lastIndexOf(this.id) + this.id.length, o.length) : this.id.call(this, o)),
                    o = this.src.replace("%id%", o),
                    !1) : void 0
                });
                var r = {};
                return s.srcAction && (r[s.srcAction] = o),
                e._parseMarkup(n, r, i),
                e.updateStatus("ready"),
                n
            }
        }
    });
    var z = function(t) {
        var i = e.items.length;
        return t > i - 1 ? t - i : 0 > t ? i + t : t
    }
      , W = function(t, e, i) {
        return t.replace(/%curr%/gi, e + 1).replace(/%total%/gi, i)
    };
    t.magnificPopup.registerModule("gallery", {
        options: {
            enabled: !1,
            arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
            preload: [0, 2],
            navigateByImgClick: !0,
            arrows: !0,
            tPrev: "Previous (Left arrow key)",
            tNext: "Next (Right arrow key)",
            tCounter: "%curr% of %total%"
        },
        proto: {
            initGallery: function() {
                var i = e.st.gallery
                  , o = ".mfp-gallery"
                  , r = Boolean(t.fn.mfpFastClick);
                return e.direction = !0,
                !(!i || !i.enabled) && (s += " mfp-gallery",
                w(d + o, function() {
                    i.navigateByImgClick && e.wrap.on("click" + o, ".mfp-img", function() {
                        return e.items.length > 1 ? (e.next(),
                        !1) : void 0
                    }),
                    n.on("keydown" + o, function(t) {
                        37 === t.keyCode ? e.prev() : 39 === t.keyCode && e.next()
                    })
                }),
                w("UpdateStatus" + o, function(t, i) {
                    i.text && (i.text = W(i.text, e.currItem.index, e.items.length))
                }),
                w(c + o, function(t, n, o, s) {
                    var r = e.items.length;
                    o.counter = r > 1 ? W(i.tCounter, s.index, r) : ""
                }),
                w("BuildControls" + o, function() {
                    if (e.items.length > 1 && i.arrows && !e.arrowLeft) {
                        var n = i.arrowMarkup
                          , o = e.arrowLeft = t(n.replace(/%title%/gi, i.tPrev).replace(/%dir%/gi, "left")).addClass(g)
                          , s = e.arrowRight = t(n.replace(/%title%/gi, i.tNext).replace(/%dir%/gi, "right")).addClass(g)
                          , a = r ? "mfpFastClick" : "click";
                        o[a](function() {
                            e.prev()
                        }),
                        s[a](function() {
                            e.next()
                        }),
                        e.isIE7 && (x("b", o[0], !1, !0),
                        x("a", o[0], !1, !0),
                        x("b", s[0], !1, !0),
                        x("a", s[0], !1, !0)),
                        e.container.append(o.add(s))
                    }
                }),
                w(p + o, function() {
                    e._preloadTimeout && clearTimeout(e._preloadTimeout),
                    e._preloadTimeout = setTimeout(function() {
                        e.preloadNearbyImages(),
                        e._preloadTimeout = null
                    }, 16)
                }),
                void w(a + o, function() {
                    n.off(o),
                    e.wrap.off("click" + o),
                    e.arrowLeft && r && e.arrowLeft.add(e.arrowRight).destroyMfpFastClick(),
                    e.arrowRight = e.arrowLeft = null
                }))
            },
            next: function() {
                e.direction = !0,
                e.index = z(e.index + 1),
                e.updateItemHTML()
            },
            prev: function() {
                e.direction = !1,
                e.index = z(e.index - 1),
                e.updateItemHTML()
            },
            goTo: function(t) {
                e.direction = t >= e.index,
                e.index = t,
                e.updateItemHTML()
            },
            preloadNearbyImages: function() {
                var t, i = e.st.gallery.preload, n = Math.min(i[0], e.items.length), o = Math.min(i[1], e.items.length);
                for (t = 1; t <= (e.direction ? o : n); t++)
                    e._preloadItem(e.index + t);
                for (t = 1; t <= (e.direction ? n : o); t++)
                    e._preloadItem(e.index - t)
            },
            _preloadItem: function(i) {
                if (i = z(i),
                !e.items[i].preloaded) {
                    var n = e.items[i];
                    n.parsed || (n = e.parseEl(i)),
                    T("LazyLoad", n),
                    "image" === n.type && (n.img = t('<img class="mfp-img" />').on("load.mfploader", function() {
                        n.hasSize = !0
                    }).on("error.mfploader", function() {
                        n.hasSize = !0,
                        n.loadError = !0,
                        T("LazyLoadError", n)
                    }).attr("src", n.src)),
                    n.preloaded = !0
                }
            }
        }
    });
    var R = "retina";
    t.magnificPopup.registerModule(R, {
        options: {
            replaceSrc: function(t) {
                return t.src.replace(/\.\w+$/, function(t) {
                    return "@2x" + t
                })
            },
            ratio: 1
        },
        proto: {
            initRetina: function() {
                if (window.devicePixelRatio > 1) {
                    var t = e.st.retina
                      , i = t.ratio;
                    (i = isNaN(i) ? i() : i) > 1 && (w("ImageHasSize." + R, function(t, e) {
                        e.img.css({
                            "max-width": e.img[0].naturalWidth / i,
                            width: "100%"
                        })
                    }),
                    w("ElementParse." + R, function(e, n) {
                        n.src = t.replaceSrc(n, i)
                    }))
                }
            }
        }
    }),
    function() {
        var e = "ontouchstart"in window
          , i = function() {
            b.off("touchmove" + n + " touchend" + n)
        }
          , n = ".mfpFastClick";
        t.fn.mfpFastClick = function(o) {
            return t(this).each(function() {
                var s, r, a, l, c, d, p, u = t(this);
                e && u.on("touchstart" + n, function(t) {
                    c = !1,
                    p = 1,
                    d = t.originalEvent ? t.originalEvent.touches[0] : t.touches[0],
                    a = d.clientX,
                    l = d.clientY,
                    b.on("touchmove" + n, function(t) {
                        d = t.originalEvent ? t.originalEvent.touches : t.touches,
                        p = d.length,
                        d = d[0],
                        (Math.abs(d.clientX - a) > 10 || Math.abs(d.clientY - l) > 10) && (c = !0,
                        i())
                    }).on("touchend" + n, function(t) {
                        i(),
                        c || p > 1 || (s = !0,
                        t.preventDefault(),
                        clearTimeout(r),
                        r = setTimeout(function() {
                            s = !1
                        }, 1e3),
                        o())
                    })
                });
                u.on("click" + n, function() {
                    s || o()
                })
            })
        }
        ,
        t.fn.destroyMfpFastClick = function() {
            t(this).off("touchstart" + n + " click" + n),
            e && b.off("touchmove" + n + " touchend" + n)
        }
    }(),
    C()
}),
jQuery(function(t) {
    "use strict";
    t(window).load(function() {
        t("#pre-status").fadeOut(),
        t("#st-preloader").delay(350).fadeOut("slow")
    }),
    t(".portfolio-items").magnificPopup({
        delegate: "a",
        type: "image",
        closeOnContentClick: !1,
        closeBtnInside: !1,
        mainClass: "mfp-with-zoom mfp-img-mobile",
        gallery: {
            enabled: !1
        },
        zoom: {
            enabled: !0,
            duration: 300,
            opener: function(t) {
                return t.find("i")
            }
        }
    }),
    t("li a[href*=#]").bind("click", function(e) {
        var i = t(this);
        t("html, body").stop().animate({
            scrollTop: t(i.attr("href")).offset().top - 79
        }, 1e3),
        e.preventDefault()
    }),
    t(".st-testimonials").owlCarousel({
        singleItem: !0,
        lazyLoad: !0,
        pagination: !1,
        navigation: !1,
        autoPlay: !0
    }),
    t(window).scroll(function() {
        t(this).scrollTop() > 100 ? t(".scroll-up").fadeIn() : t(".scroll-up").fadeOut()
    })
});
var ssc_activeElement, ssc_framerate = 150, ssc_animtime = 500, ssc_stepsize = 150, ssc_pulseAlgorithm = !0, ssc_pulseScale = 6, ssc_pulseNormalize = 1, ssc_keyboardsupport = !0, ssc_arrowscroll = 50, ssc_frame = !1, ssc_direction = {
    x: 0,
    y: 0
}, ssc_initdone = !1, ssc_fixedback = !0, ssc_root = document.documentElement, ssc_key = {
    left: 37,
    up: 38,
    right: 39,
    down: 40,
    spacebar: 32,
    pageup: 33,
    pagedown: 34,
    end: 35,
    home: 36
}, ssc_que = [], ssc_pending = !1, ssc_cache = {};
setInterval(function() {
    ssc_cache = {}
}, 1e4);
var ssc_uniqueID = function() {
    var t = 0;
    return function(e) {
        return e.ssc_uniqueID || (e.ssc_uniqueID = t++)
    }
}()
  , ischrome = /chrome/.test(navigator.userAgent.toLowerCase());
ischrome && (ssc_addEvent("mousedown", ssc_mousedown),
ssc_addEvent("mousewheel", ssc_wheel),
ssc_addEvent("load", ssc_init)),
function() {
    var t = [].indexOf || function(t) {
        for (var e = 0, i = this.length; e < i; e++)
            if (e in this && this[e] === t)
                return e;
        return -1
    }
      , e = [].slice;
    !function(t, e) {
        "function" == typeof define && define.amd ? define("waypoints", ["jquery"], function(i) {
            return e(i, t)
        }) : e(t.jQuery, t)
    }(this, function(i, n) {
        var o, s, r, a, l, c, d, p, u, h, f, m, g, v, y, b;
        return o = i(n),
        p = t.call(n, "ontouchstart") >= 0,
        a = {
            horizontal: {},
            vertical: {}
        },
        l = 1,
        d = {},
        c = "waypoints-context-id",
        f = "resize.waypoints",
        m = "scroll.waypoints",
        g = 1,
        v = "waypoints-waypoint-ids",
        y = "waypoint",
        b = "waypoints",
        s = function() {
            function t(t) {
                var e = this;
                this.$element = t,
                this.element = t[0],
                this.didResize = !1,
                this.didScroll = !1,
                this.id = "context" + l++,
                this.oldScroll = {
                    x: t.scrollLeft(),
                    y: t.scrollTop()
                },
                this.waypoints = {
                    horizontal: {},
                    vertical: {}
                },
                t.data(c, this.id),
                d[this.id] = this,
                t.bind(m, function() {
                    var t;
                    if (!e.didScroll && !p)
                        return e.didScroll = !0,
                        t = function() {
                            return e.doScroll(),
                            e.didScroll = !1
                        }
                        ,
                        n.setTimeout(t, i[b].settings.scrollThrottle)
                }),
                t.bind(f, function() {
                    var t;
                    if (!e.didResize)
                        return e.didResize = !0,
                        t = function() {
                            return i[b]("refresh"),
                            e.didResize = !1
                        }
                        ,
                        n.setTimeout(t, i[b].settings.resizeThrottle)
                })
            }
            return t.prototype.doScroll = function() {
                var t, e = this;
                return t = {
                    horizontal: {
                        newScroll: this.$element.scrollLeft(),
                        oldScroll: this.oldScroll.x,
                        forward: "right",
                        backward: "left"
                    },
                    vertical: {
                        newScroll: this.$element.scrollTop(),
                        oldScroll: this.oldScroll.y,
                        forward: "down",
                        backward: "up"
                    }
                },
                !p || t.vertical.oldScroll && t.vertical.newScroll || i[b]("refresh"),
                i.each(t, function(t, n) {
                    var o, s, r;
                    return r = [],
                    s = n.newScroll > n.oldScroll,
                    o = s ? n.forward : n.backward,
                    i.each(e.waypoints[t], function(t, e) {
                        var i, o;
                        return n.oldScroll < (i = e.offset) && i <= n.newScroll ? r.push(e) : n.newScroll < (o = e.offset) && o <= n.oldScroll ? r.push(e) : void 0
                    }),
                    r.sort(function(t, e) {
                        return t.offset - e.offset
                    }),
                    s || r.reverse(),
                    i.each(r, function(t, e) {
                        if (e.options.continuous || t === r.length - 1)
                            return e.trigger([o])
                    })
                }),
                this.oldScroll = {
                    x: t.horizontal.newScroll,
                    y: t.vertical.newScroll
                }
            }
            ,
            t.prototype.refresh = function() {
                var t, e, n, o = this;
                return n = i.isWindow(this.element),
                e = this.$element.offset(),
                this.doScroll(),
                t = {
                    horizontal: {
                        contextOffset: n ? 0 : e.left,
                        contextScroll: n ? 0 : this.oldScroll.x,
                        contextDimension: this.$element.width(),
                        oldScroll: this.oldScroll.x,
                        forward: "right",
                        backward: "left",
                        offsetProp: "left"
                    },
                    vertical: {
                        contextOffset: n ? 0 : e.top,
                        contextScroll: n ? 0 : this.oldScroll.y,
                        contextDimension: n ? i[b]("viewportHeight") : this.$element.height(),
                        oldScroll: this.oldScroll.y,
                        forward: "down",
                        backward: "up",
                        offsetProp: "top"
                    }
                },
                i.each(t, function(t, e) {
                    return i.each(o.waypoints[t], function(t, n) {
                        var o, s, r, a, l;
                        if (o = n.options.offset,
                        r = n.offset,
                        s = i.isWindow(n.element) ? 0 : n.$element.offset()[e.offsetProp],
                        i.isFunction(o) ? o = o.apply(n.element) : "string" == typeof o && (o = parseFloat(o),
                        n.options.offset.indexOf("%") > -1 && (o = Math.ceil(e.contextDimension * o / 100))),
                        n.offset = s - e.contextOffset + e.contextScroll - o,
                        (!n.options.onlyOnScroll || null == r) && n.enabled)
                            return null !== r && r < (a = e.oldScroll) && a <= n.offset ? n.trigger([e.backward]) : null !== r && r > (l = e.oldScroll) && l >= n.offset ? n.trigger([e.forward]) : null === r && e.oldScroll >= n.offset ? n.trigger([e.forward]) : void 0
                    })
                })
            }
            ,
            t.prototype.checkEmpty = function() {
                if (i.isEmptyObject(this.waypoints.horizontal) && i.isEmptyObject(this.waypoints.vertical))
                    return this.$element.unbind([f, m].join(" ")),
                    delete d[this.id]
            }
            ,
            t
        }(),
        r = function() {
            function t(t, e, n) {
                var o, s;
                "bottom-in-view" === (n = i.extend({}, i.fn[y].defaults, n)).offset && (n.offset = function() {
                    var t;
                    return t = i[b]("viewportHeight"),
                    i.isWindow(e.element) || (t = e.$element.height()),
                    t - i(this).outerHeight()
                }
                ),
                this.$element = t,
                this.element = t[0],
                this.axis = n.horizontal ? "horizontal" : "vertical",
                this.callback = n.handler,
                this.context = e,
                this.enabled = n.enabled,
                this.id = "waypoints" + g++,
                this.offset = null,
                this.options = n,
                e.waypoints[this.axis][this.id] = this,
                a[this.axis][this.id] = this,
                (o = null != (s = t.data(v)) ? s : []).push(this.id),
                t.data(v, o)
            }
            return t.prototype.trigger = function(t) {
                if (this.enabled)
                    return null != this.callback && this.callback.apply(this.element, t),
                    this.options.triggerOnce ? this.destroy() : void 0
            }
            ,
            t.prototype.disable = function() {
                return this.enabled = !1
            }
            ,
            t.prototype.enable = function() {
                return this.context.refresh(),
                this.enabled = !0
            }
            ,
            t.prototype.destroy = function() {
                return delete a[this.axis][this.id],
                delete this.context.waypoints[this.axis][this.id],
                this.context.checkEmpty()
            }
            ,
            t.getWaypointsByElement = function(t) {
                var e, n;
                return (n = i(t).data(v)) ? (e = i.extend({}, a.horizontal, a.vertical),
                i.map(n, function(t) {
                    return e[t]
                })) : []
            }
            ,
            t
        }(),
        h = {
            init: function(t, e) {
                return null == e && (e = {}),
                null == e.handler && (e.handler = t),
                this.each(function() {
                    var t, n, o, a;
                    return t = i(this),
                    o = null != (a = e.context) ? a : i.fn[y].defaults.context,
                    i.isWindow(o) || (o = t.closest(o)),
                    o = i(o),
                    (n = d[o.data(c)]) || (n = new s(o)),
                    new r(t,n,e)
                }),
                i[b]("refresh"),
                this
            },
            disable: function() {
                return h._invoke(this, "disable")
            },
            enable: function() {
                return h._invoke(this, "enable")
            },
            destroy: function() {
                return h._invoke(this, "destroy")
            },
            prev: function(t, e) {
                return h._traverse.call(this, t, e, function(t, e, i) {
                    if (e > 0)
                        return t.push(i[e - 1])
                })
            },
            next: function(t, e) {
                return h._traverse.call(this, t, e, function(t, e, i) {
                    if (e < i.length - 1)
                        return t.push(i[e + 1])
                })
            },
            _traverse: function(t, e, o) {
                var s, r;
                return null == t && (t = "vertical"),
                null == e && (e = n),
                r = u.aggregate(e),
                s = [],
                this.each(function() {
                    var e;
                    return e = i.inArray(this, r[t]),
                    o(s, e, r[t])
                }),
                this.pushStack(s)
            },
            _invoke: function(t, e) {
                return t.each(function() {
                    var t;
                    return t = r.getWaypointsByElement(this),
                    i.each(t, function(t, i) {
                        return i[e](),
                        !0
                    })
                }),
                this
            }
        },
        i.fn[y] = function() {
            var t, n;
            return n = arguments[0],
            t = 2 <= arguments.length ? e.call(arguments, 1) : [],
            h[n] ? h[n].apply(this, t) : i.isFunction(n) ? h.init.apply(this, arguments) : i.isPlainObject(n) ? h.init.apply(this, [null, n]) : n ? i.error("The " + n + " method does not exist in jQuery Waypoints.") : i.error("jQuery Waypoints needs a callback function or handler option.")
        }
        ,
        i.fn[y].defaults = {
            context: n,
            continuous: !0,
            enabled: !0,
            horizontal: !1,
            offset: 0,
            triggerOnce: !1
        },
        u = {
            refresh: function() {
                return i.each(d, function(t, e) {
                    return e.refresh()
                })
            },
            viewportHeight: function() {
                var t;
                return null != (t = n.innerHeight) ? t : o.height()
            },
            aggregate: function(t) {
                var e, n, o;
                return e = a,
                t && (e = null != (o = d[i(t).data(c)]) ? o.waypoints : void 0),
                e ? (n = {
                    horizontal: [],
                    vertical: []
                },
                i.each(n, function(t, o) {
                    return i.each(e[t], function(t, e) {
                        return o.push(e)
                    }),
                    o.sort(function(t, e) {
                        return t.offset - e.offset
                    }),
                    n[t] = i.map(o, function(t) {
                        return t.element
                    }),
                    n[t] = i.unique(n[t])
                }),
                n) : []
            },
            above: function(t) {
                return null == t && (t = n),
                u._filter(t, "vertical", function(t, e) {
                    return e.offset <= t.oldScroll.y
                })
            },
            below: function(t) {
                return null == t && (t = n),
                u._filter(t, "vertical", function(t, e) {
                    return e.offset > t.oldScroll.y
                })
            },
            left: function(t) {
                return null == t && (t = n),
                u._filter(t, "horizontal", function(t, e) {
                    return e.offset <= t.oldScroll.x
                })
            },
            right: function(t) {
                return null == t && (t = n),
                u._filter(t, "horizontal", function(t, e) {
                    return e.offset > t.oldScroll.x
                })
            },
            enable: function() {
                return u._invoke("enable")
            },
            disable: function() {
                return u._invoke("disable")
            },
            destroy: function() {
                return u._invoke("destroy")
            },
            extendFn: function(t, e) {
                return h[t] = e
            },
            _invoke: function(t) {
                var e;
                return e = i.extend({}, a.vertical, a.horizontal),
                i.each(e, function(e, i) {
                    return i[t](),
                    !0
                })
            },
            _filter: function(t, e, n) {
                var o, s;
                return (o = d[i(t).data(c)]) ? (s = [],
                i.each(o.waypoints[e], function(t, e) {
                    if (n(o, e))
                        return s.push(e)
                }),
                s.sort(function(t, e) {
                    return t.offset - e.offset
                }),
                i.map(s, function(t) {
                    return t.element
                })) : []
            }
        },
        i[b] = function() {
            var t, i;
            return i = arguments[0],
            t = 2 <= arguments.length ? e.call(arguments, 1) : [],
            u[i] ? u[i].apply(null, t) : u.aggregate.call(null, i)
        }
        ,
        i[b].settings = {
            resizeThrottle: 100,
            scrollThrottle: 30
        },
        o.load(function() {
            return i[b]("refresh")
        })
    })
}
.call(this),
function(t) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], t) : "undefined" != typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
}(function(t) {
    "use strict";
    var e = window.Slick || {};
    (e = function() {
        var e = 0;
        return function(i, n) {
            var o, s = this;
            s.defaults = {
                accessibility: !0,
                adaptiveHeight: !1,
                appendArrows: t(i),
                appendDots: t(i),
                arrows: !0,
                asNavFor: null,
                prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button">Previous</button>',
                nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button">Next</button>',
                autoplay: !1,
                autoplaySpeed: 3e3,
                centerMode: !1,
                centerPadding: "50px",
                cssEase: "ease",
                customPaging: function(e, i) {
                    return t('<button type="button" data-role="none" role="button" tabindex="0" />').text(i + 1)
                },
                dots: !1,
                dotsClass: "slick-dots",
                draggable: !0,
                easing: "linear",
                edgeFriction: .35,
                fade: !1,
                focusOnSelect: !1,
                infinite: !0,
                initialSlide: 0,
                lazyLoad: "ondemand",
                mobileFirst: !1,
                pauseOnHover: !0,
                pauseOnFocus: !0,
                pauseOnDotsHover: !1,
                respondTo: "window",
                responsive: null,
                rows: 1,
                rtl: !1,
                slide: "",
                slidesPerRow: 1,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
                swipe: !0,
                swipeToSlide: !1,
                touchMove: !0,
                touchThreshold: 5,
                useCSS: !0,
                useTransform: !0,
                variableWidth: !1,
                vertical: !1,
                verticalSwiping: !1,
                waitForAnimate: !0,
                zIndex: 1e3
            },
            s.initials = {
                animating: !1,
                dragging: !1,
                autoPlayTimer: null,
                currentDirection: 0,
                currentLeft: null,
                currentSlide: 0,
                direction: 1,
                $dots: null,
                listWidth: null,
                listHeight: null,
                loadIndex: 0,
                $nextArrow: null,
                $prevArrow: null,
                slideCount: null,
                slideWidth: null,
                $slideTrack: null,
                $slides: null,
                sliding: !1,
                slideOffset: 0,
                swipeLeft: null,
                $list: null,
                touchObject: {},
                transformsEnabled: !1,
                unslicked: !1
            },
            t.extend(s, s.initials),
            s.activeBreakpoint = null,
            s.animType = null,
            s.animProp = null,
            s.breakpoints = [],
            s.breakpointSettings = [],
            s.cssTransitions = !1,
            s.focussed = !1,
            s.interrupted = !1,
            s.hidden = "hidden",
            s.paused = !0,
            s.positionProp = null,
            s.respondTo = null,
            s.rowCount = 1,
            s.shouldClick = !0,
            s.$slider = t(i),
            s.$slidesCache = null,
            s.transformType = null,
            s.transitionType = null,
            s.visibilityChange = "visibilitychange",
            s.windowWidth = 0,
            s.windowTimer = null,
            o = t(i).data("slick") || {},
            s.options = t.extend({}, s.defaults, n, o),
            s.currentSlide = s.options.initialSlide,
            s.originalSettings = s.options,
            void 0 !== document.mozHidden ? (s.hidden = "mozHidden",
            s.visibilityChange = "mozvisibilitychange") : void 0 !== document.webkitHidden && (s.hidden = "webkitHidden",
            s.visibilityChange = "webkitvisibilitychange"),
            s.autoPlay = t.proxy(s.autoPlay, s),
            s.autoPlayClear = t.proxy(s.autoPlayClear, s),
            s.autoPlayIterator = t.proxy(s.autoPlayIterator, s),
            s.changeSlide = t.proxy(s.changeSlide, s),
            s.clickHandler = t.proxy(s.clickHandler, s),
            s.selectHandler = t.proxy(s.selectHandler, s),
            s.setPosition = t.proxy(s.setPosition, s),
            s.swipeHandler = t.proxy(s.swipeHandler, s),
            s.dragHandler = t.proxy(s.dragHandler, s),
            s.keyHandler = t.proxy(s.keyHandler, s),
            s.instanceUid = e++,
            s.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/,
            s.registerBreakpoints(),
            s.init(!0)
        }
    }()).prototype.activateADA = function() {
        this.$slideTrack.find(".slick-active").attr({
            "aria-hidden": "false"
        }).find("a, input, button, select").attr({
            tabindex: "0"
        })
    }
    ,
    e.prototype.addSlide = e.prototype.slickAdd = function(e, i, n) {
        var o = this;
        if ("boolean" == typeof i)
            n = i,
            i = null;
        else if (i < 0 || i >= o.slideCount)
            return !1;
        o.unload(),
        "number" == typeof i ? 0 === i && 0 === o.$slides.length ? t(e).appendTo(o.$slideTrack) : n ? t(e).insertBefore(o.$slides.eq(i)) : t(e).insertAfter(o.$slides.eq(i)) : !0 === n ? t(e).prependTo(o.$slideTrack) : t(e).appendTo(o.$slideTrack),
        o.$slides = o.$slideTrack.children(this.options.slide),
        o.$slideTrack.children(this.options.slide).detach(),
        o.$slideTrack.append(o.$slides),
        o.$slides.each(function(e, i) {
            t(i).attr("data-slick-index", e)
        }),
        o.$slidesCache = o.$slides,
        o.reinit()
    }
    ,
    e.prototype.animateHeight = function() {
        var t = this;
        if (1 === t.options.slidesToShow && !0 === t.options.adaptiveHeight && !1 === t.options.vertical) {
            var e = t.$slides.eq(t.currentSlide).outerHeight(!0);
            t.$list.animate({
                height: e
            }, t.options.speed)
        }
    }
    ,
    e.prototype.animateSlide = function(e, i) {
        var n = {}
          , o = this;
        o.animateHeight(),
        !0 === o.options.rtl && !1 === o.options.vertical && (e = -e),
        !1 === o.transformsEnabled ? !1 === o.options.vertical ? o.$slideTrack.animate({
            left: e
        }, o.options.speed, o.options.easing, i) : o.$slideTrack.animate({
            top: e
        }, o.options.speed, o.options.easing, i) : !1 === o.cssTransitions ? (!0 === o.options.rtl && (o.currentLeft = -o.currentLeft),
        t({
            animStart: o.currentLeft
        }).animate({
            animStart: e
        }, {
            duration: o.options.speed,
            easing: o.options.easing,
            step: function(t) {
                t = Math.ceil(t),
                !1 === o.options.vertical ? (n[o.animType] = "translate(" + t + "px, 0px)",
                o.$slideTrack.css(n)) : (n[o.animType] = "translate(0px," + t + "px)",
                o.$slideTrack.css(n))
            },
            complete: function() {
                i && i.call()
            }
        })) : (o.applyTransition(),
        e = Math.ceil(e),
        !1 === o.options.vertical ? n[o.animType] = "translate3d(" + e + "px, 0px, 0px)" : n[o.animType] = "translate3d(0px," + e + "px, 0px)",
        o.$slideTrack.css(n),
        i && setTimeout(function() {
            o.disableTransition(),
            i.call()
        }, o.options.speed))
    }
    ,
    e.prototype.getNavTarget = function() {
        var e = this.options.asNavFor;
        return e && null !== e && (e = t(e).not(this.$slider)),
        e
    }
    ,
    e.prototype.asNavFor = function(e) {
        var i = this.getNavTarget();
        null !== i && "object" == typeof i && i.each(function() {
            var i = t(this).slick("getSlick");
            i.unslicked || i.slideHandler(e, !0)
        })
    }
    ,
    e.prototype.applyTransition = function(t) {
        var e = this
          , i = {};
        !1 === e.options.fade ? i[e.transitionType] = e.transformType + " " + e.options.speed + "ms " + e.options.cssEase : i[e.transitionType] = "opacity " + e.options.speed + "ms " + e.options.cssEase,
        !1 === e.options.fade ? e.$slideTrack.css(i) : e.$slides.eq(t).css(i)
    }
    ,
    e.prototype.autoPlay = function() {
        var t = this;
        t.autoPlayClear(),
        t.slideCount > t.options.slidesToShow && (t.autoPlayTimer = setInterval(t.autoPlayIterator, t.options.autoplaySpeed))
    }
    ,
    e.prototype.autoPlayClear = function() {
        this.autoPlayTimer && clearInterval(this.autoPlayTimer)
    }
    ,
    e.prototype.autoPlayIterator = function() {
        var t = this
          , e = t.currentSlide + t.options.slidesToScroll;
        t.paused || t.interrupted || t.focussed || (!1 === t.options.infinite && (1 === t.direction && t.currentSlide + 1 === t.slideCount - 1 ? t.direction = 0 : 0 === t.direction && (e = t.currentSlide - t.options.slidesToScroll,
        t.currentSlide - 1 == 0 && (t.direction = 1))),
        t.slideHandler(e))
    }
    ,
    e.prototype.buildArrows = function() {
        var e = this;
        !0 === e.options.arrows && (e.$prevArrow = t(e.options.prevArrow).addClass("slick-arrow"),
        e.$nextArrow = t(e.options.nextArrow).addClass("slick-arrow"),
        e.slideCount > e.options.slidesToShow ? (e.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),
        e.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),
        e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.prependTo(e.options.appendArrows),
        e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.appendTo(e.options.appendArrows),
        !0 !== e.options.infinite && e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")) : e.$prevArrow.add(e.$nextArrow).addClass("slick-hidden").attr({
            "aria-disabled": "true",
            tabindex: "-1"
        }))
    }
    ,
    e.prototype.buildDots = function() {
        var e, i, n = this;
        if (!0 === n.options.dots && n.slideCount > n.options.slidesToShow) {
            for (n.$slider.addClass("slick-dotted"),
            i = t("<ul />").addClass(n.options.dotsClass),
            e = 0; e <= n.getDotCount(); e += 1)
                i.append(t("<li />").append(n.options.customPaging.call(this, n, e)));
            n.$dots = i.appendTo(n.options.appendDots),
            n.$dots.find("li").first().addClass("slick-active").attr("aria-hidden", "false")
        }
    }
    ,
    e.prototype.buildOut = function() {
        var e = this;
        e.$slides = e.$slider.children(e.options.slide + ":not(.slick-cloned)").addClass("slick-slide"),
        e.slideCount = e.$slides.length,
        e.$slides.each(function(e, i) {
            t(i).attr("data-slick-index", e).data("originalStyling", t(i).attr("style") || "")
        }),
        e.$slider.addClass("slick-slider"),
        e.$slideTrack = 0 === e.slideCount ? t('<div class="slick-track"/>').appendTo(e.$slider) : e.$slides.wrapAll('<div class="slick-track"/>').parent(),
        e.$list = e.$slideTrack.wrap('<div aria-live="polite" class="slick-list"/>').parent(),
        e.$slideTrack.css("opacity", 0),
        !0 !== e.options.centerMode && !0 !== e.options.swipeToSlide || (e.options.slidesToScroll = 1),
        t("img[data-lazy]", e.$slider).not("[src]").addClass("slick-loading"),
        e.setupInfinite(),
        e.buildArrows(),
        e.buildDots(),
        e.updateDots(),
        e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0),
        !0 === e.options.draggable && e.$list.addClass("draggable")
    }
    ,
    e.prototype.buildRows = function() {
        var t, e, i, n, o, s, r, a = this;
        if (n = document.createDocumentFragment(),
        s = a.$slider.children(),
        a.options.rows > 1) {
            for (r = a.options.slidesPerRow * a.options.rows,
            o = Math.ceil(s.length / r),
            t = 0; t < o; t++) {
                var l = document.createElement("div");
                for (e = 0; e < a.options.rows; e++) {
                    var c = document.createElement("div");
                    for (i = 0; i < a.options.slidesPerRow; i++) {
                        var d = t * r + (e * a.options.slidesPerRow + i);
                        s.get(d) && c.appendChild(s.get(d))
                    }
                    l.appendChild(c)
                }
                n.appendChild(l)
            }
            a.$slider.empty().append(n),
            a.$slider.children().children().children().css({
                width: 100 / a.options.slidesPerRow + "%",
                display: "inline-block"
            })
        }
    }
    ,
    e.prototype.checkResponsive = function(e, i) {
        var n, o, s, r = this, a = !1, l = r.$slider.width(), c = window.innerWidth || t(window).width();
        if ("window" === r.respondTo ? s = c : "slider" === r.respondTo ? s = l : "min" === r.respondTo && (s = Math.min(c, l)),
        r.options.responsive && r.options.responsive.length && null !== r.options.responsive) {
            for (n in o = null,
            r.breakpoints)
                r.breakpoints.hasOwnProperty(n) && (!1 === r.originalSettings.mobileFirst ? s < r.breakpoints[n] && (o = r.breakpoints[n]) : s > r.breakpoints[n] && (o = r.breakpoints[n]));
            null !== o ? null !== r.activeBreakpoint ? (o !== r.activeBreakpoint || i) && (r.activeBreakpoint = o,
            "unslick" === r.breakpointSettings[o] ? r.unslick(o) : (r.options = t.extend({}, r.originalSettings, r.breakpointSettings[o]),
            !0 === e && (r.currentSlide = r.options.initialSlide),
            r.refresh(e)),
            a = o) : (r.activeBreakpoint = o,
            "unslick" === r.breakpointSettings[o] ? r.unslick(o) : (r.options = t.extend({}, r.originalSettings, r.breakpointSettings[o]),
            !0 === e && (r.currentSlide = r.options.initialSlide),
            r.refresh(e)),
            a = o) : null !== r.activeBreakpoint && (r.activeBreakpoint = null,
            r.options = r.originalSettings,
            !0 === e && (r.currentSlide = r.options.initialSlide),
            r.refresh(e),
            a = o),
            e || !1 === a || r.$slider.trigger("breakpoint", [r, a])
        }
    }
    ,
    e.prototype.changeSlide = function(e, i) {
        var n, o, s = this, r = t(e.currentTarget);
        switch (r.is("a") && e.preventDefault(),
        r.is("li") || (r = r.closest("li")),
        n = s.slideCount % s.options.slidesToScroll != 0 ? 0 : (s.slideCount - s.currentSlide) % s.options.slidesToScroll,
        e.data.message) {
        case "previous":
            o = 0 === n ? s.options.slidesToScroll : s.options.slidesToShow - n,
            s.slideCount > s.options.slidesToShow && s.slideHandler(s.currentSlide - o, !1, i);
            break;
        case "next":
            o = 0 === n ? s.options.slidesToScroll : n,
            s.slideCount > s.options.slidesToShow && s.slideHandler(s.currentSlide + o, !1, i);
            break;
        case "index":
            var a = 0 === e.data.index ? 0 : e.data.index || r.index() * s.options.slidesToScroll;
            s.slideHandler(s.checkNavigable(a), !1, i),
            r.children().trigger("focus");
            break;
        default:
            return
        }
    }
    ,
    e.prototype.checkNavigable = function(t) {
        var e, i;
        if (i = 0,
        t > (e = this.getNavigableIndexes())[e.length - 1])
            t = e[e.length - 1];
        else
            for (var n in e) {
                if (t < e[n]) {
                    t = i;
                    break
                }
                i = e[n]
            }
        return t
    }
    ,
    e.prototype.cleanUpEvents = function() {
        var e = this;
        e.options.dots && null !== e.$dots && t("li", e.$dots).off("click.slick", e.changeSlide).off("mouseenter.slick", t.proxy(e.interrupt, e, !0)).off("mouseleave.slick", t.proxy(e.interrupt, e, !1)),
        e.$slider.off("focus.slick blur.slick"),
        !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow && e.$prevArrow.off("click.slick", e.changeSlide),
        e.$nextArrow && e.$nextArrow.off("click.slick", e.changeSlide)),
        e.$list.off("touchstart.slick mousedown.slick", e.swipeHandler),
        e.$list.off("touchmove.slick mousemove.slick", e.swipeHandler),
        e.$list.off("touchend.slick mouseup.slick", e.swipeHandler),
        e.$list.off("touchcancel.slick mouseleave.slick", e.swipeHandler),
        e.$list.off("click.slick", e.clickHandler),
        t(document).off(e.visibilityChange, e.visibility),
        e.cleanUpSlideEvents(),
        !0 === e.options.accessibility && e.$list.off("keydown.slick", e.keyHandler),
        !0 === e.options.focusOnSelect && t(e.$slideTrack).children().off("click.slick", e.selectHandler),
        t(window).off("orientationchange.slick.slick-" + e.instanceUid, e.orientationChange),
        t(window).off("resize.slick.slick-" + e.instanceUid, e.resize),
        t("[draggable!=true]", e.$slideTrack).off("dragstart", e.preventDefault),
        t(window).off("load.slick.slick-" + e.instanceUid, e.setPosition),
        t(document).off("ready.slick.slick-" + e.instanceUid, e.setPosition)
    }
    ,
    e.prototype.cleanUpSlideEvents = function() {
        var e = this;
        e.$list.off("mouseenter.slick", t.proxy(e.interrupt, e, !0)),
        e.$list.off("mouseleave.slick", t.proxy(e.interrupt, e, !1))
    }
    ,
    e.prototype.cleanUpRows = function() {
        var t, e = this;
        e.options.rows > 1 && ((t = e.$slides.children().children()).removeAttr("style"),
        e.$slider.empty().append(t))
    }
    ,
    e.prototype.clickHandler = function(t) {
        !1 === this.shouldClick && (t.stopImmediatePropagation(),
        t.stopPropagation(),
        t.preventDefault())
    }
    ,
    e.prototype.destroy = function(e) {
        var i = this;
        i.autoPlayClear(),
        i.touchObject = {},
        i.cleanUpEvents(),
        t(".slick-cloned", i.$slider).detach(),
        i.$dots && i.$dots.remove(),
        i.$prevArrow && i.$prevArrow.length && (i.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""),
        i.htmlExpr.test(i.options.prevArrow) && i.$prevArrow.remove()),
        i.$nextArrow && i.$nextArrow.length && (i.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""),
        i.htmlExpr.test(i.options.nextArrow) && i.$nextArrow.remove()),
        i.$slides && (i.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function() {
            t(this).attr("style", t(this).data("originalStyling"))
        }),
        i.$slideTrack.children(this.options.slide).detach(),
        i.$slideTrack.detach(),
        i.$list.detach(),
        i.$slider.append(i.$slides)),
        i.cleanUpRows(),
        i.$slider.removeClass("slick-slider"),
        i.$slider.removeClass("slick-initialized"),
        i.$slider.removeClass("slick-dotted"),
        i.unslicked = !0,
        e || i.$slider.trigger("destroy", [i])
    }
    ,
    e.prototype.disableTransition = function(t) {
        var e = this
          , i = {};
        i[e.transitionType] = "",
        !1 === e.options.fade ? e.$slideTrack.css(i) : e.$slides.eq(t).css(i)
    }
    ,
    e.prototype.fadeSlide = function(t, e) {
        var i = this;
        !1 === i.cssTransitions ? (i.$slides.eq(t).css({
            zIndex: i.options.zIndex
        }),
        i.$slides.eq(t).animate({
            opacity: 1
        }, i.options.speed, i.options.easing, e)) : (i.applyTransition(t),
        i.$slides.eq(t).css({
            opacity: 1,
            zIndex: i.options.zIndex
        }),
        e && setTimeout(function() {
            i.disableTransition(t),
            e.call()
        }, i.options.speed))
    }
    ,
    e.prototype.fadeSlideOut = function(t) {
        var e = this;
        !1 === e.cssTransitions ? e.$slides.eq(t).animate({
            opacity: 0,
            zIndex: e.options.zIndex - 2
        }, e.options.speed, e.options.easing) : (e.applyTransition(t),
        e.$slides.eq(t).css({
            opacity: 0,
            zIndex: e.options.zIndex - 2
        }))
    }
    ,
    e.prototype.filterSlides = e.prototype.slickFilter = function(t) {
        var e = this;
        null !== t && (e.$slidesCache = e.$slides,
        e.unload(),
        e.$slideTrack.children(this.options.slide).detach(),
        e.$slidesCache.filter(t).appendTo(e.$slideTrack),
        e.reinit())
    }
    ,
    e.prototype.focusHandler = function() {
        var e = this;
        e.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick", "*:not(.slick-arrow)", function(i) {
            i.stopImmediatePropagation();
            var n = t(this);
            setTimeout(function() {
                e.options.pauseOnFocus && (e.focussed = n.is(":focus"),
                e.autoPlay())
            }, 0)
        })
    }
    ,
    e.prototype.getCurrent = e.prototype.slickCurrentSlide = function() {
        return this.currentSlide
    }
    ,
    e.prototype.getDotCount = function() {
        var t = this
          , e = 0
          , i = 0
          , n = 0;
        if (!0 === t.options.infinite)
            for (; e < t.slideCount; )
                ++n,
                e = i + t.options.slidesToScroll,
                i += t.options.slidesToScroll <= t.options.slidesToShow ? t.options.slidesToScroll : t.options.slidesToShow;
        else if (!0 === t.options.centerMode)
            n = t.slideCount;
        else if (t.options.asNavFor)
            for (; e < t.slideCount; )
                ++n,
                e = i + t.options.slidesToScroll,
                i += t.options.slidesToScroll <= t.options.slidesToShow ? t.options.slidesToScroll : t.options.slidesToShow;
        else
            n = 1 + Math.ceil((t.slideCount - t.options.slidesToShow) / t.options.slidesToScroll);
        return n - 1
    }
    ,
    e.prototype.getLeft = function(t) {
        var e, i, n, o = this, s = 0;
        return o.slideOffset = 0,
        i = o.$slides.first().outerHeight(!0),
        !0 === o.options.infinite ? (o.slideCount > o.options.slidesToShow && (o.slideOffset = o.slideWidth * o.options.slidesToShow * -1,
        s = i * o.options.slidesToShow * -1),
        o.slideCount % o.options.slidesToScroll != 0 && t + o.options.slidesToScroll > o.slideCount && o.slideCount > o.options.slidesToShow && (t > o.slideCount ? (o.slideOffset = (o.options.slidesToShow - (t - o.slideCount)) * o.slideWidth * -1,
        s = (o.options.slidesToShow - (t - o.slideCount)) * i * -1) : (o.slideOffset = o.slideCount % o.options.slidesToScroll * o.slideWidth * -1,
        s = o.slideCount % o.options.slidesToScroll * i * -1))) : t + o.options.slidesToShow > o.slideCount && (o.slideOffset = (t + o.options.slidesToShow - o.slideCount) * o.slideWidth,
        s = (t + o.options.slidesToShow - o.slideCount) * i),
        o.slideCount <= o.options.slidesToShow && (o.slideOffset = 0,
        s = 0),
        !0 === o.options.centerMode && !0 === o.options.infinite ? o.slideOffset += o.slideWidth * Math.floor(o.options.slidesToShow / 2) - o.slideWidth : !0 === o.options.centerMode && (o.slideOffset = 0,
        o.slideOffset += o.slideWidth * Math.floor(o.options.slidesToShow / 2)),
        e = !1 === o.options.vertical ? t * o.slideWidth * -1 + o.slideOffset : t * i * -1 + s,
        !0 === o.options.variableWidth && (n = o.slideCount <= o.options.slidesToShow || !1 === o.options.infinite ? o.$slideTrack.children(".slick-slide").eq(t) : o.$slideTrack.children(".slick-slide").eq(t + o.options.slidesToShow),
        e = !0 === o.options.rtl ? n[0] ? -1 * (o.$slideTrack.width() - n[0].offsetLeft - n.width()) : 0 : n[0] ? -1 * n[0].offsetLeft : 0,
        !0 === o.options.centerMode && (n = o.slideCount <= o.options.slidesToShow || !1 === o.options.infinite ? o.$slideTrack.children(".slick-slide").eq(t) : o.$slideTrack.children(".slick-slide").eq(t + o.options.slidesToShow + 1),
        e = !0 === o.options.rtl ? n[0] ? -1 * (o.$slideTrack.width() - n[0].offsetLeft - n.width()) : 0 : n[0] ? -1 * n[0].offsetLeft : 0,
        e += (o.$list.width() - n.outerWidth()) / 2)),
        e
    }
    ,
    e.prototype.getOption = e.prototype.slickGetOption = function(t) {
        return this.options[t]
    }
    ,
    e.prototype.getNavigableIndexes = function() {
        var t, e = this, i = 0, n = 0, o = [];
        for (!1 === e.options.infinite ? t = e.slideCount : (i = -1 * e.options.slidesToScroll,
        n = -1 * e.options.slidesToScroll,
        t = 2 * e.slideCount); i < t; )
            o.push(i),
            i = n + e.options.slidesToScroll,
            n += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow;
        return o
    }
    ,
    e.prototype.getSlick = function() {
        return this
    }
    ,
    e.prototype.getSlideCount = function() {
        var e, i, n = this;
        return i = !0 === n.options.centerMode ? n.slideWidth * Math.floor(n.options.slidesToShow / 2) : 0,
        !0 === n.options.swipeToSlide ? (n.$slideTrack.find(".slick-slide").each(function(o, s) {
            if (s.offsetLeft - i + t(s).outerWidth() / 2 > -1 * n.swipeLeft)
                return e = s,
                !1
        }),
        Math.abs(t(e).attr("data-slick-index") - n.currentSlide) || 1) : n.options.slidesToScroll
    }
    ,
    e.prototype.goTo = e.prototype.slickGoTo = function(t, e) {
        this.changeSlide({
            data: {
                message: "index",
                index: parseInt(t)
            }
        }, e)
    }
    ,
    e.prototype.init = function(e) {
        var i = this;
        t(i.$slider).hasClass("slick-initialized") || (t(i.$slider).addClass("slick-initialized"),
        i.buildRows(),
        i.buildOut(),
        i.setProps(),
        i.startLoad(),
        i.loadSlider(),
        i.initializeEvents(),
        i.updateArrows(),
        i.updateDots(),
        i.checkResponsive(!0),
        i.focusHandler()),
        e && i.$slider.trigger("init", [i]),
        !0 === i.options.accessibility && i.initADA(),
        i.options.autoplay && (i.paused = !1,
        i.autoPlay())
    }
    ,
    e.prototype.initADA = function() {
        var e = this;
        e.$slides.add(e.$slideTrack.find(".slick-cloned")).attr({
            "aria-hidden": "true",
            tabindex: "-1"
        }).find("a, input, button, select").attr({
            tabindex: "-1"
        }),
        e.$slideTrack.attr("role", "listbox"),
        e.$slides.not(e.$slideTrack.find(".slick-cloned")).each(function(i) {
            t(this).attr({
                role: "option",
                "aria-describedby": "slick-slide" + e.instanceUid + i
            })
        }),
        null !== e.$dots && e.$dots.attr("role", "tablist").find("li").each(function(i) {
            t(this).attr({
                role: "presentation",
                "aria-selected": "false",
                "aria-controls": "navigation" + e.instanceUid + i,
                id: "slick-slide" + e.instanceUid + i
            })
        }).first().attr("aria-selected", "true").end().find("button").attr("role", "button").end().closest("div").attr("role", "toolbar"),
        e.activateADA()
    }
    ,
    e.prototype.initArrowEvents = function() {
        var t = this;
        !0 === t.options.arrows && t.slideCount > t.options.slidesToShow && (t.$prevArrow.off("click.slick").on("click.slick", {
            message: "previous"
        }, t.changeSlide),
        t.$nextArrow.off("click.slick").on("click.slick", {
            message: "next"
        }, t.changeSlide))
    }
    ,
    e.prototype.initDotEvents = function() {
        var e = this;
        !0 === e.options.dots && e.slideCount > e.options.slidesToShow && t("li", e.$dots).on("click.slick", {
            message: "index"
        }, e.changeSlide),
        !0 === e.options.dots && !0 === e.options.pauseOnDotsHover && t("li", e.$dots).on("mouseenter.slick", t.proxy(e.interrupt, e, !0)).on("mouseleave.slick", t.proxy(e.interrupt, e, !1))
    }
    ,
    e.prototype.initSlideEvents = function() {
        var e = this;
        e.options.pauseOnHover && (e.$list.on("mouseenter.slick", t.proxy(e.interrupt, e, !0)),
        e.$list.on("mouseleave.slick", t.proxy(e.interrupt, e, !1)))
    }
    ,
    e.prototype.initializeEvents = function() {
        var e = this;
        e.initArrowEvents(),
        e.initDotEvents(),
        e.initSlideEvents(),
        e.$list.on("touchstart.slick mousedown.slick", {
            action: "start"
        }, e.swipeHandler),
        e.$list.on("touchmove.slick mousemove.slick", {
            action: "move"
        }, e.swipeHandler),
        e.$list.on("touchend.slick mouseup.slick", {
            action: "end"
        }, e.swipeHandler),
        e.$list.on("touchcancel.slick mouseleave.slick", {
            action: "end"
        }, e.swipeHandler),
        e.$list.on("click.slick", e.clickHandler),
        t(document).on(e.visibilityChange, t.proxy(e.visibility, e)),
        !0 === e.options.accessibility && e.$list.on("keydown.slick", e.keyHandler),
        !0 === e.options.focusOnSelect && t(e.$slideTrack).children().on("click.slick", e.selectHandler),
        t(window).on("orientationchange.slick.slick-" + e.instanceUid, t.proxy(e.orientationChange, e)),
        t(window).on("resize.slick.slick-" + e.instanceUid, t.proxy(e.resize, e)),
        t("[draggable!=true]", e.$slideTrack).on("dragstart", e.preventDefault),
        t(window).on("load.slick.slick-" + e.instanceUid, e.setPosition),
        t(document).on("ready.slick.slick-" + e.instanceUid, e.setPosition)
    }
    ,
    e.prototype.initUI = function() {
        var t = this;
        !0 === t.options.arrows && t.slideCount > t.options.slidesToShow && (t.$prevArrow.show(),
        t.$nextArrow.show()),
        !0 === t.options.dots && t.slideCount > t.options.slidesToShow && t.$dots.show()
    }
    ,
    e.prototype.keyHandler = function(t) {
        var e = this;
        t.target.tagName.match("TEXTAREA|INPUT|SELECT") || (37 === t.keyCode && !0 === e.options.accessibility ? e.changeSlide({
            data: {
                message: !0 === e.options.rtl ? "next" : "previous"
            }
        }) : 39 === t.keyCode && !0 === e.options.accessibility && e.changeSlide({
            data: {
                message: !0 === e.options.rtl ? "previous" : "next"
            }
        }))
    }
    ,
    e.prototype.lazyLoad = function() {
        var e, i, n = this;
        function o(e) {
            t("img[data-lazy]", e).each(function() {
                var e = t(this)
                  , i = t(this).attr("data-lazy")
                  , o = document.createElement("img");
                o.onload = function() {
                    e.animate({
                        opacity: 0
                    }, 100, function() {
                        e.attr("src", i).animate({
                            opacity: 1
                        }, 200, function() {
                            e.removeAttr("data-lazy").removeClass("slick-loading")
                        }),
                        n.$slider.trigger("lazyLoaded", [n, e, i])
                    })
                }
                ,
                o.onerror = function() {
                    e.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"),
                    n.$slider.trigger("lazyLoadError", [n, e, i])
                }
                ,
                o.src = i
            })
        }
        !0 === n.options.centerMode ? !0 === n.options.infinite ? i = (e = n.currentSlide + (n.options.slidesToShow / 2 + 1)) + n.options.slidesToShow + 2 : (e = Math.max(0, n.currentSlide - (n.options.slidesToShow / 2 + 1)),
        i = n.options.slidesToShow / 2 + 1 + 2 + n.currentSlide) : (e = n.options.infinite ? n.options.slidesToShow + n.currentSlide : n.currentSlide,
        i = Math.ceil(e + n.options.slidesToShow),
        !0 === n.options.fade && (e > 0 && e--,
        i <= n.slideCount && i++)),
        o(n.$slider.find(".slick-slide").slice(e, i)),
        n.slideCount <= n.options.slidesToShow ? o(n.$slider.find(".slick-slide")) : n.currentSlide >= n.slideCount - n.options.slidesToShow ? o(n.$slider.find(".slick-cloned").slice(0, n.options.slidesToShow)) : 0 === n.currentSlide && o(n.$slider.find(".slick-cloned").slice(-1 * n.options.slidesToShow))
    }
    ,
    e.prototype.loadSlider = function() {
        var t = this;
        t.setPosition(),
        t.$slideTrack.css({
            opacity: 1
        }),
        t.$slider.removeClass("slick-loading"),
        t.initUI(),
        "progressive" === t.options.lazyLoad && t.progressiveLazyLoad()
    }
    ,
    e.prototype.next = e.prototype.slickNext = function() {
        this.changeSlide({
            data: {
                message: "next"
            }
        })
    }
    ,
    e.prototype.orientationChange = function() {
        this.checkResponsive(),
        this.setPosition()
    }
    ,
    e.prototype.pause = e.prototype.slickPause = function() {
        this.autoPlayClear(),
        this.paused = !0
    }
    ,
    e.prototype.play = e.prototype.slickPlay = function() {
        var t = this;
        t.autoPlay(),
        t.options.autoplay = !0,
        t.paused = !1,
        t.focussed = !1,
        t.interrupted = !1
    }
    ,
    e.prototype.postSlide = function(t) {
        var e = this;
        e.unslicked || (e.$slider.trigger("afterChange", [e, t]),
        e.animating = !1,
        e.setPosition(),
        e.swipeLeft = null,
        e.options.autoplay && e.autoPlay(),
        !0 === e.options.accessibility && e.initADA())
    }
    ,
    e.prototype.prev = e.prototype.slickPrev = function() {
        this.changeSlide({
            data: {
                message: "previous"
            }
        })
    }
    ,
    e.prototype.preventDefault = function(t) {
        t.preventDefault()
    }
    ,
    e.prototype.progressiveLazyLoad = function(e) {
        e = e || 1;
        var i, n, o, s = this, r = t("img[data-lazy]", s.$slider);
        r.length ? (i = r.first(),
        n = i.attr("data-lazy"),
        (o = document.createElement("img")).onload = function() {
            i.attr("src", n).removeAttr("data-lazy").removeClass("slick-loading"),
            !0 === s.options.adaptiveHeight && s.setPosition(),
            s.$slider.trigger("lazyLoaded", [s, i, n]),
            s.progressiveLazyLoad()
        }
        ,
        o.onerror = function() {
            e < 3 ? setTimeout(function() {
                s.progressiveLazyLoad(e + 1)
            }, 500) : (i.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"),
            s.$slider.trigger("lazyLoadError", [s, i, n]),
            s.progressiveLazyLoad())
        }
        ,
        o.src = n) : s.$slider.trigger("allImagesLoaded", [s])
    }
    ,
    e.prototype.refresh = function(e) {
        var i, n, o = this;
        n = o.slideCount - o.options.slidesToShow,
        !o.options.infinite && o.currentSlide > n && (o.currentSlide = n),
        o.slideCount <= o.options.slidesToShow && (o.currentSlide = 0),
        i = o.currentSlide,
        o.destroy(!0),
        t.extend(o, o.initials, {
            currentSlide: i
        }),
        o.init(),
        e || o.changeSlide({
            data: {
                message: "index",
                index: i
            }
        }, !1)
    }
    ,
    e.prototype.registerBreakpoints = function() {
        var e, i, n, o = this, s = o.options.responsive || null;
        if ("array" === t.type(s) && s.length) {
            for (e in o.respondTo = o.options.respondTo || "window",
            s)
                if (n = o.breakpoints.length - 1,
                i = s[e].breakpoint,
                s.hasOwnProperty(e)) {
                    for (; n >= 0; )
                        o.breakpoints[n] && o.breakpoints[n] === i && o.breakpoints.splice(n, 1),
                        n--;
                    o.breakpoints.push(i),
                    o.breakpointSettings[i] = s[e].settings
                }
            o.breakpoints.sort(function(t, e) {
                return o.options.mobileFirst ? t - e : e - t
            })
        }
    }
    ,
    e.prototype.reinit = function() {
        var e = this;
        e.$slides = e.$slideTrack.children(e.options.slide).addClass("slick-slide"),
        e.slideCount = e.$slides.length,
        e.currentSlide >= e.slideCount && 0 !== e.currentSlide && (e.currentSlide = e.currentSlide - e.options.slidesToScroll),
        e.slideCount <= e.options.slidesToShow && (e.currentSlide = 0),
        e.registerBreakpoints(),
        e.setProps(),
        e.setupInfinite(),
        e.buildArrows(),
        e.updateArrows(),
        e.initArrowEvents(),
        e.buildDots(),
        e.updateDots(),
        e.initDotEvents(),
        e.cleanUpSlideEvents(),
        e.initSlideEvents(),
        e.checkResponsive(!1, !0),
        !0 === e.options.focusOnSelect && t(e.$slideTrack).children().on("click.slick", e.selectHandler),
        e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0),
        e.setPosition(),
        e.focusHandler(),
        e.paused = !e.options.autoplay,
        e.autoPlay(),
        e.$slider.trigger("reInit", [e])
    }
    ,
    e.prototype.resize = function() {
        var e = this;
        t(window).width() !== e.windowWidth && (clearTimeout(e.windowDelay),
        e.windowDelay = window.setTimeout(function() {
            e.windowWidth = t(window).width(),
            e.checkResponsive(),
            e.unslicked || e.setPosition()
        }, 50))
    }
    ,
    e.prototype.removeSlide = e.prototype.slickRemove = function(t, e, i) {
        var n = this;
        if (t = "boolean" == typeof t ? !0 === (e = t) ? 0 : n.slideCount - 1 : !0 === e ? --t : t,
        n.slideCount < 1 || t < 0 || t > n.slideCount - 1)
            return !1;
        n.unload(),
        !0 === i ? n.$slideTrack.children().remove() : n.$slideTrack.children(this.options.slide).eq(t).remove(),
        n.$slides = n.$slideTrack.children(this.options.slide),
        n.$slideTrack.children(this.options.slide).detach(),
        n.$slideTrack.append(n.$slides),
        n.$slidesCache = n.$slides,
        n.reinit()
    }
    ,
    e.prototype.setCSS = function(t) {
        var e, i, n = this, o = {};
        !0 === n.options.rtl && (t = -t),
        e = "left" == n.positionProp ? Math.ceil(t) + "px" : "0px",
        i = "top" == n.positionProp ? Math.ceil(t) + "px" : "0px",
        o[n.positionProp] = t,
        !1 === n.transformsEnabled ? n.$slideTrack.css(o) : (o = {},
        !1 === n.cssTransitions ? (o[n.animType] = "translate(" + e + ", " + i + ")",
        n.$slideTrack.css(o)) : (o[n.animType] = "translate3d(" + e + ", " + i + ", 0px)",
        n.$slideTrack.css(o)))
    }
    ,
    e.prototype.setDimensions = function() {
        var t = this;
        !1 === t.options.vertical ? !0 === t.options.centerMode && t.$list.css({
            padding: "0px " + t.options.centerPadding
        }) : (t.$list.height(t.$slides.first().outerHeight(!0) * t.options.slidesToShow),
        !0 === t.options.centerMode && t.$list.css({
            padding: t.options.centerPadding + " 0px"
        })),
        t.listWidth = t.$list.width(),
        t.listHeight = t.$list.height(),
        !1 === t.options.vertical && !1 === t.options.variableWidth ? (t.slideWidth = Math.ceil(t.listWidth / t.options.slidesToShow),
        t.$slideTrack.width(Math.ceil(t.slideWidth * t.$slideTrack.children(".slick-slide").length))) : !0 === t.options.variableWidth ? t.$slideTrack.width(5e3 * t.slideCount) : (t.slideWidth = Math.ceil(t.listWidth),
        t.$slideTrack.height(Math.ceil(t.$slides.first().outerHeight(!0) * t.$slideTrack.children(".slick-slide").length)));
        var e = t.$slides.first().outerWidth(!0) - t.$slides.first().width();
        !1 === t.options.variableWidth && t.$slideTrack.children(".slick-slide").width(t.slideWidth - e)
    }
    ,
    e.prototype.setFade = function() {
        var e, i = this;
        i.$slides.each(function(n, o) {
            e = i.slideWidth * n * -1,
            !0 === i.options.rtl ? t(o).css({
                position: "relative",
                right: e,
                top: 0,
                zIndex: i.options.zIndex - 2,
                opacity: 0
            }) : t(o).css({
                position: "relative",
                left: e,
                top: 0,
                zIndex: i.options.zIndex - 2,
                opacity: 0
            })
        }),
        i.$slides.eq(i.currentSlide).css({
            zIndex: i.options.zIndex - 1,
            opacity: 1
        })
    }
    ,
    e.prototype.setHeight = function() {
        var t = this;
        if (1 === t.options.slidesToShow && !0 === t.options.adaptiveHeight && !1 === t.options.vertical) {
            var e = t.$slides.eq(t.currentSlide).outerHeight(!0);
            t.$list.css("height", e)
        }
    }
    ,
    e.prototype.setOption = e.prototype.slickSetOption = function() {
        var e, i, n, o, s, r = this, a = !1;
        if ("object" === t.type(arguments[0]) ? (n = arguments[0],
        a = arguments[1],
        s = "multiple") : "string" === t.type(arguments[0]) && (n = arguments[0],
        o = arguments[1],
        a = arguments[2],
        "responsive" === arguments[0] && "array" === t.type(arguments[1]) ? s = "responsive" : void 0 !== arguments[1] && (s = "single")),
        "single" === s)
            r.options[n] = o;
        else if ("multiple" === s)
            t.each(n, function(t, e) {
                r.options[t] = e
            });
        else if ("responsive" === s)
            for (i in o)
                if ("array" !== t.type(r.options.responsive))
                    r.options.responsive = [o[i]];
                else {
                    for (e = r.options.responsive.length - 1; e >= 0; )
                        r.options.responsive[e].breakpoint === o[i].breakpoint && r.options.responsive.splice(e, 1),
                        e--;
                    r.options.responsive.push(o[i])
                }
        a && (r.unload(),
        r.reinit())
    }
    ,
    e.prototype.setPosition = function() {
        var t = this;
        t.setDimensions(),
        t.setHeight(),
        !1 === t.options.fade ? t.setCSS(t.getLeft(t.currentSlide)) : t.setFade(),
        t.$slider.trigger("setPosition", [t])
    }
    ,
    e.prototype.setProps = function() {
        var t = this
          , e = document.body.style;
        t.positionProp = !0 === t.options.vertical ? "top" : "left",
        "top" === t.positionProp ? t.$slider.addClass("slick-vertical") : t.$slider.removeClass("slick-vertical"),
        void 0 === e.WebkitTransition && void 0 === e.MozTransition && void 0 === e.msTransition || !0 === t.options.useCSS && (t.cssTransitions = !0),
        t.options.fade && ("number" == typeof t.options.zIndex ? t.options.zIndex < 3 && (t.options.zIndex = 3) : t.options.zIndex = t.defaults.zIndex),
        void 0 !== e.OTransform && (t.animType = "OTransform",
        t.transformType = "-o-transform",
        t.transitionType = "OTransition",
        void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (t.animType = !1)),
        void 0 !== e.MozTransform && (t.animType = "MozTransform",
        t.transformType = "-moz-transform",
        t.transitionType = "MozTransition",
        void 0 === e.perspectiveProperty && void 0 === e.MozPerspective && (t.animType = !1)),
        void 0 !== e.webkitTransform && (t.animType = "webkitTransform",
        t.transformType = "-webkit-transform",
        t.transitionType = "webkitTransition",
        void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (t.animType = !1)),
        void 0 !== e.msTransform && (t.animType = "msTransform",
        t.transformType = "-ms-transform",
        t.transitionType = "msTransition",
        void 0 === e.msTransform && (t.animType = !1)),
        void 0 !== e.transform && !1 !== t.animType && (t.animType = "transform",
        t.transformType = "transform",
        t.transitionType = "transition"),
        t.transformsEnabled = t.options.useTransform && null !== t.animType && !1 !== t.animType
    }
    ,
    e.prototype.setSlideClasses = function(t) {
        var e, i, n, o, s = this;
        i = s.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true"),
        s.$slides.eq(t).addClass("slick-current"),
        !0 === s.options.centerMode ? (e = Math.floor(s.options.slidesToShow / 2),
        !0 === s.options.infinite && (t >= e && t <= s.slideCount - 1 - e ? s.$slides.slice(t - e, t + e + 1).addClass("slick-active").attr("aria-hidden", "false") : (n = s.options.slidesToShow + t,
        i.slice(n - e + 1, n + e + 2).addClass("slick-active").attr("aria-hidden", "false")),
        0 === t ? i.eq(i.length - 1 - s.options.slidesToShow).addClass("slick-center") : t === s.slideCount - 1 && i.eq(s.options.slidesToShow).addClass("slick-center")),
        s.$slides.eq(t).addClass("slick-center")) : t >= 0 && t <= s.slideCount - s.options.slidesToShow ? s.$slides.slice(t, t + s.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false") : i.length <= s.options.slidesToShow ? i.addClass("slick-active").attr("aria-hidden", "false") : (o = s.slideCount % s.options.slidesToShow,
        n = !0 === s.options.infinite ? s.options.slidesToShow + t : t,
        s.options.slidesToShow == s.options.slidesToScroll && s.slideCount - t < s.options.slidesToShow ? i.slice(n - (s.options.slidesToShow - o), n + o).addClass("slick-active").attr("aria-hidden", "false") : i.slice(n, n + s.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false")),
        "ondemand" === s.options.lazyLoad && s.lazyLoad()
    }
    ,
    e.prototype.setupInfinite = function() {
        var e, i, n, o = this;
        if (!0 === o.options.fade && (o.options.centerMode = !1),
        !0 === o.options.infinite && !1 === o.options.fade && (i = null,
        o.slideCount > o.options.slidesToShow)) {
            for (n = !0 === o.options.centerMode ? o.options.slidesToShow + 1 : o.options.slidesToShow,
            e = o.slideCount; e > o.slideCount - n; e -= 1)
                i = e - 1,
                t(o.$slides[i]).clone(!0).attr("id", "").attr("data-slick-index", i - o.slideCount).prependTo(o.$slideTrack).addClass("slick-cloned");
            for (e = 0; e < n; e += 1)
                i = e,
                t(o.$slides[i]).clone(!0).attr("id", "").attr("data-slick-index", i + o.slideCount).appendTo(o.$slideTrack).addClass("slick-cloned");
            o.$slideTrack.find(".slick-cloned").find("[id]").each(function() {
                t(this).attr("id", "")
            })
        }
    }
    ,
    e.prototype.interrupt = function(t) {
        t || this.autoPlay(),
        this.interrupted = t
    }
    ,
    e.prototype.selectHandler = function(e) {
        var i = this
          , n = t(e.target).is(".slick-slide") ? t(e.target) : t(e.target).parents(".slick-slide")
          , o = parseInt(n.attr("data-slick-index"));
        if (o || (o = 0),
        i.slideCount <= i.options.slidesToShow)
            return i.setSlideClasses(o),
            void i.asNavFor(o);
        i.slideHandler(o)
    }
    ,
    e.prototype.slideHandler = function(t, e, i) {
        var n, o, s, r, a, l, c = this;
        if (e = e || !1,
        (!0 !== c.animating || !0 !== c.options.waitForAnimate) && !(!0 === c.options.fade && c.currentSlide === t || c.slideCount <= c.options.slidesToShow))
            if (!1 === e && c.asNavFor(t),
            n = t,
            a = c.getLeft(n),
            r = c.getLeft(c.currentSlide),
            c.currentLeft = null === c.swipeLeft ? r : c.swipeLeft,
            !1 === c.options.infinite && !1 === c.options.centerMode && (t < 0 || t > c.getDotCount() * c.options.slidesToScroll))
                !1 === c.options.fade && (n = c.currentSlide,
                !0 !== i ? c.animateSlide(r, function() {
                    c.postSlide(n)
                }) : c.postSlide(n));
            else if (!1 === c.options.infinite && !0 === c.options.centerMode && (t < 0 || t > c.slideCount - c.options.slidesToScroll))
                !1 === c.options.fade && (n = c.currentSlide,
                !0 !== i ? c.animateSlide(r, function() {
                    c.postSlide(n)
                }) : c.postSlide(n));
            else {
                if (c.options.autoplay && clearInterval(c.autoPlayTimer),
                o = n < 0 ? c.slideCount % c.options.slidesToScroll != 0 ? c.slideCount - c.slideCount % c.options.slidesToScroll : c.slideCount + n : n >= c.slideCount ? c.slideCount % c.options.slidesToScroll != 0 ? 0 : n - c.slideCount : n,
                c.animating = !0,
                c.$slider.trigger("beforeChange", [c, c.currentSlide, o]),
                s = c.currentSlide,
                c.currentSlide = o,
                c.setSlideClasses(c.currentSlide),
                c.options.asNavFor && (l = (l = c.getNavTarget()).slick("getSlick")).slideCount <= l.options.slidesToShow && l.setSlideClasses(c.currentSlide),
                c.updateDots(),
                c.updateArrows(),
                !0 === c.options.fade)
                    return !0 !== i ? (c.fadeSlideOut(s),
                    c.fadeSlide(o, function() {
                        c.postSlide(o)
                    })) : c.postSlide(o),
                    void c.animateHeight();
                !0 !== i ? c.animateSlide(a, function() {
                    c.postSlide(o)
                }) : c.postSlide(o)
            }
    }
    ,
    e.prototype.startLoad = function() {
        var t = this;
        !0 === t.options.arrows && t.slideCount > t.options.slidesToShow && (t.$prevArrow.hide(),
        t.$nextArrow.hide()),
        !0 === t.options.dots && t.slideCount > t.options.slidesToShow && t.$dots.hide(),
        t.$slider.addClass("slick-loading")
    }
    ,
    e.prototype.swipeDirection = function() {
        var t, e, i, n, o = this;
        return t = o.touchObject.startX - o.touchObject.curX,
        e = o.touchObject.startY - o.touchObject.curY,
        i = Math.atan2(e, t),
        (n = Math.round(180 * i / Math.PI)) < 0 && (n = 360 - Math.abs(n)),
        n <= 45 && n >= 0 ? !1 === o.options.rtl ? "left" : "right" : n <= 360 && n >= 315 ? !1 === o.options.rtl ? "left" : "right" : n >= 135 && n <= 225 ? !1 === o.options.rtl ? "right" : "left" : !0 === o.options.verticalSwiping ? n >= 35 && n <= 135 ? "down" : "up" : "vertical"
    }
    ,
    e.prototype.swipeEnd = function(t) {
        var e, i, n = this;
        if (n.dragging = !1,
        n.interrupted = !1,
        n.shouldClick = !(n.touchObject.swipeLength > 10),
        void 0 === n.touchObject.curX)
            return !1;
        if (!0 === n.touchObject.edgeHit && n.$slider.trigger("edge", [n, n.swipeDirection()]),
        n.touchObject.swipeLength >= n.touchObject.minSwipe) {
            switch (i = n.swipeDirection()) {
            case "left":
            case "down":
                e = n.options.swipeToSlide ? n.checkNavigable(n.currentSlide + n.getSlideCount()) : n.currentSlide + n.getSlideCount(),
                n.currentDirection = 0;
                break;
            case "right":
            case "up":
                e = n.options.swipeToSlide ? n.checkNavigable(n.currentSlide - n.getSlideCount()) : n.currentSlide - n.getSlideCount(),
                n.currentDirection = 1
            }
            "vertical" != i && (n.slideHandler(e),
            n.touchObject = {},
            n.$slider.trigger("swipe", [n, i]))
        } else
            n.touchObject.startX !== n.touchObject.curX && (n.slideHandler(n.currentSlide),
            n.touchObject = {})
    }
    ,
    e.prototype.swipeHandler = function(t) {
        var e = this;
        if (!(!1 === e.options.swipe || "ontouchend"in document && !1 === e.options.swipe || !1 === e.options.draggable && -1 !== t.type.indexOf("mouse")))
            switch (e.touchObject.fingerCount = t.originalEvent && void 0 !== t.originalEvent.touches ? t.originalEvent.touches.length : 1,
            e.touchObject.minSwipe = e.listWidth / e.options.touchThreshold,
            !0 === e.options.verticalSwiping && (e.touchObject.minSwipe = e.listHeight / e.options.touchThreshold),
            t.data.action) {
            case "start":
                e.swipeStart(t);
                break;
            case "move":
                e.swipeMove(t);
                break;
            case "end":
                e.swipeEnd(t)
            }
    }
    ,
    e.prototype.swipeMove = function(t) {
        var e, i, n, o, s, r = this;
        return s = void 0 !== t.originalEvent ? t.originalEvent.touches : null,
        !(!r.dragging || s && 1 !== s.length) && (e = r.getLeft(r.currentSlide),
        r.touchObject.curX = void 0 !== s ? s[0].pageX : t.clientX,
        r.touchObject.curY = void 0 !== s ? s[0].pageY : t.clientY,
        r.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(r.touchObject.curX - r.touchObject.startX, 2))),
        !0 === r.options.verticalSwiping && (r.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(r.touchObject.curY - r.touchObject.startY, 2)))),
        "vertical" !== (i = r.swipeDirection()) ? (void 0 !== t.originalEvent && r.touchObject.swipeLength > 4 && t.preventDefault(),
        o = (!1 === r.options.rtl ? 1 : -1) * (r.touchObject.curX > r.touchObject.startX ? 1 : -1),
        !0 === r.options.verticalSwiping && (o = r.touchObject.curY > r.touchObject.startY ? 1 : -1),
        n = r.touchObject.swipeLength,
        r.touchObject.edgeHit = !1,
        !1 === r.options.infinite && (0 === r.currentSlide && "right" === i || r.currentSlide >= r.getDotCount() && "left" === i) && (n = r.touchObject.swipeLength * r.options.edgeFriction,
        r.touchObject.edgeHit = !0),
        !1 === r.options.vertical ? r.swipeLeft = e + n * o : r.swipeLeft = e + n * (r.$list.height() / r.listWidth) * o,
        !0 === r.options.verticalSwiping && (r.swipeLeft = e + n * o),
        !0 !== r.options.fade && !1 !== r.options.touchMove && (!0 === r.animating ? (r.swipeLeft = null,
        !1) : void r.setCSS(r.swipeLeft))) : void 0)
    }
    ,
    e.prototype.swipeStart = function(t) {
        var e, i = this;
        if (i.interrupted = !0,
        1 !== i.touchObject.fingerCount || i.slideCount <= i.options.slidesToShow)
            return i.touchObject = {},
            !1;
        void 0 !== t.originalEvent && void 0 !== t.originalEvent.touches && (e = t.originalEvent.touches[0]),
        i.touchObject.startX = i.touchObject.curX = void 0 !== e ? e.pageX : t.clientX,
        i.touchObject.startY = i.touchObject.curY = void 0 !== e ? e.pageY : t.clientY,
        i.dragging = !0
    }
    ,
    e.prototype.unfilterSlides = e.prototype.slickUnfilter = function() {
        var t = this;
        null !== t.$slidesCache && (t.unload(),
        t.$slideTrack.children(this.options.slide).detach(),
        t.$slidesCache.appendTo(t.$slideTrack),
        t.reinit())
    }
    ,
    e.prototype.unload = function() {
        var e = this;
        t(".slick-cloned", e.$slider).remove(),
        e.$dots && e.$dots.remove(),
        e.$prevArrow && e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.remove(),
        e.$nextArrow && e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.remove(),
        e.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "")
    }
    ,
    e.prototype.unslick = function(t) {
        var e = this;
        e.$slider.trigger("unslick", [e, t]),
        e.destroy()
    }
    ,
    e.prototype.updateArrows = function() {
        var t = this;
        Math.floor(t.options.slidesToShow / 2),
        !0 === t.options.arrows && t.slideCount > t.options.slidesToShow && !t.options.infinite && (t.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"),
        t.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"),
        0 === t.currentSlide ? (t.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"),
        t.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : t.currentSlide >= t.slideCount - t.options.slidesToShow && !1 === t.options.centerMode ? (t.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"),
        t.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : t.currentSlide >= t.slideCount - 1 && !0 === t.options.centerMode && (t.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"),
        t.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")))
    }
    ,
    e.prototype.updateDots = function() {
        var t = this;
        null !== t.$dots && (t.$dots.find("li").removeClass("slick-active").attr("aria-hidden", "true"),
        t.$dots.find("li").eq(Math.floor(t.currentSlide / t.options.slidesToScroll)).addClass("slick-active").attr("aria-hidden", "false"))
    }
    ,
    e.prototype.visibility = function() {
        var t = this;
        t.options.autoplay && (document[t.hidden] ? t.interrupted = !0 : t.interrupted = !1)
    }
    ,
    t.fn.slick = function() {
        var t, i, n = this, o = arguments[0], s = Array.prototype.slice.call(arguments, 1), r = n.length;
        for (t = 0; t < r; t++)
            if ("object" == typeof o || void 0 === o ? n[t].slick = new e(n[t],o) : i = n[t].slick[o].apply(n[t].slick, s),
            void 0 !== i)
                return i;
        return n
    }
}),
function(t, e, i, n) {
    var o = i("html")
      , s = i(t)
      , r = i(e)
      , a = i.fancybox = function() {
        a.open.apply(this, arguments)
    }
      , l = navigator.userAgent.match(/msie/i)
      , c = null
      , d = e.createTouch !== n
      , p = function(t) {
        return t && t.hasOwnProperty && t instanceof i
    }
      , u = function(t) {
        return t && "string" === i.type(t)
    }
      , h = function(t) {
        return u(t) && 0 < t.indexOf("%")
    }
      , f = function(t, e) {
        var i = parseInt(t, 10) || 0;
        return e && h(t) && (i *= a.getViewport()[e] / 100),
        Math.ceil(i)
    }
      , m = function(t, e) {
        return f(t, e) + "px"
    };
    i.extend(a, {
        version: "2.1.5",
        defaults: {
            padding: 15,
            margin: 20,
            width: 800,
            height: 600,
            minWidth: 100,
            minHeight: 100,
            maxWidth: 9999,
            maxHeight: 9999,
            pixelRatio: 1,
            autoSize: !0,
            autoHeight: !1,
            autoWidth: !1,
            autoResize: !0,
            autoCenter: !d,
            fitToView: !0,
            aspectRatio: !1,
            topRatio: .5,
            leftRatio: .5,
            scrolling: "auto",
            wrapCSS: "",
            arrows: !0,
            closeBtn: !0,
            closeClick: !1,
            nextClick: !1,
            mouseWheel: !0,
            autoPlay: !1,
            playSpeed: 3e3,
            preload: 3,
            modal: !1,
            loop: !0,
            ajax: {
                dataType: "html",
                headers: {
                    "X-fancyBox": !0
                }
            },
            iframe: {
                scrolling: "auto",
                preload: !0
            },
            swf: {
                wmode: "transparent",
                allowfullscreen: "true",
                allowscriptaccess: "always"
            },
            keys: {
                next: {
                    13: "left",
                    34: "up",
                    39: "left",
                    40: "up"
                },
                prev: {
                    8: "right",
                    33: "down",
                    37: "right",
                    38: "down"
                },
                close: [27],
                play: [32],
                toggle: [70]
            },
            direction: {
                next: "left",
                prev: "right"
            },
            scrollOutside: !0,
            index: 0,
            type: null,
            href: null,
            content: null,
            title: null,
            tpl: {
                wrap: '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',
                image: '<img class="fancybox-image" src="{href}" alt="" />',
                iframe: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen' + (l ? ' allowtransparency="true"' : "") + "></iframe>",
                error: '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
                closeBtn: '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',
                next: '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
                prev: '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
            },
            openEffect: "fade",
            openSpeed: 250,
            openEasing: "swing",
            openOpacity: !0,
            openMethod: "zoomIn",
            closeEffect: "fade",
            closeSpeed: 250,
            closeEasing: "swing",
            closeOpacity: !0,
            closeMethod: "zoomOut",
            nextEffect: "elastic",
            nextSpeed: 250,
            nextEasing: "swing",
            nextMethod: "changeIn",
            prevEffect: "elastic",
            prevSpeed: 250,
            prevEasing: "swing",
            prevMethod: "changeOut",
            helpers: {
                overlay: !0,
                title: !0
            },
            onCancel: i.noop,
            beforeLoad: i.noop,
            afterLoad: i.noop,
            beforeShow: i.noop,
            afterShow: i.noop,
            beforeChange: i.noop,
            beforeClose: i.noop,
            afterClose: i.noop
        },
        group: {},
        opts: {},
        previous: null,
        coming: null,
        current: null,
        isActive: !1,
        isOpen: !1,
        isOpened: !1,
        wrap: null,
        skin: null,
        outer: null,
        inner: null,
        player: {
            timer: null,
            isActive: !1
        },
        ajaxLoad: null,
        imgPreload: null,
        transitions: {},
        helpers: {},
        open: function(t, e) {
            if (t && (i.isPlainObject(e) || (e = {}),
            !1 !== a.close(!0)))
                return i.isArray(t) || (t = p(t) ? i(t).get() : [t]),
                i.each(t, function(o, s) {
                    var r, l, c, d, h, f = {};
                    "object" === i.type(s) && (s.nodeType && (s = i(s)),
                    p(s) ? (f = {
                        href: s.data("fancybox-href") || s.attr("href"),
                        title: i("<div/>").text(s.data("fancybox-title") || s.attr("title")).html(),
                        isDom: !0,
                        element: s
                    },
                    i.metadata && i.extend(!0, f, s.metadata())) : f = s),
                    r = e.href || f.href || (u(s) ? s : null),
                    l = e.title !== n ? e.title : f.title || "",
                    !(d = (c = e.content || f.content) ? "html" : e.type || f.type) && f.isDom && ((d = s.data("fancybox-type")) || (d = (d = s.prop("class").match(/fancybox\.(\w+)/)) ? d[1] : null)),
                    u(r) && (d || (a.isImage(r) ? d = "image" : a.isSWF(r) ? d = "swf" : "#" === r.charAt(0) ? d = "inline" : u(s) && (d = "html",
                    c = s)),
                    "ajax" === d && (h = r.split(/\s+/, 2),
                    r = h.shift(),
                    h = h.shift())),
                    c || ("inline" === d ? r ? c = i(u(r) ? r.replace(/.*(?=#[^\s]+$)/, "") : r) : f.isDom && (c = s) : "html" === d ? c = r : d || r || !f.isDom || (d = "inline",
                    c = s)),
                    i.extend(f, {
                        href: r,
                        type: d,
                        content: c,
                        title: l,
                        selector: h
                    }),
                    t[o] = f
                }),
                a.opts = i.extend(!0, {}, a.defaults, e),
                e.keys !== n && (a.opts.keys = !!e.keys && i.extend({}, a.defaults.keys, e.keys)),
                a.group = t,
                a._start(a.opts.index)
        },
        cancel: function() {
            var t = a.coming;
            t && !1 === a.trigger("onCancel") || (a.hideLoading(),
            t && (a.ajaxLoad && a.ajaxLoad.abort(),
            a.ajaxLoad = null,
            a.imgPreload && (a.imgPreload.onload = a.imgPreload.onerror = null),
            t.wrap && t.wrap.stop(!0, !0).trigger("onReset").remove(),
            a.coming = null,
            a.current || a._afterZoomOut(t)))
        },
        close: function(t) {
            a.cancel(),
            !1 !== a.trigger("beforeClose") && (a.unbindEvents(),
            a.isActive && (a.isOpen && !0 !== t ? (a.isOpen = a.isOpened = !1,
            a.isClosing = !0,
            i(".fancybox-item, .fancybox-nav").remove(),
            a.wrap.stop(!0, !0).removeClass("fancybox-opened"),
            a.transitions[a.current.closeMethod]()) : (i(".fancybox-wrap").stop(!0).trigger("onReset").remove(),
            a._afterZoomOut())))
        },
        play: function(t) {
            var e = function() {
                clearTimeout(a.player.timer)
            }
              , i = function() {
                e(),
                a.current && a.player.isActive && (a.player.timer = setTimeout(a.next, a.current.playSpeed))
            }
              , n = function() {
                e(),
                r.unbind(".player"),
                a.player.isActive = !1,
                a.trigger("onPlayEnd")
            };
            !0 === t || !a.player.isActive && !1 !== t ? a.current && (a.current.loop || a.current.index < a.group.length - 1) && (a.player.isActive = !0,
            r.bind({
                "onCancel.player beforeClose.player": n,
                "onUpdate.player": i,
                "beforeLoad.player": e
            }),
            i(),
            a.trigger("onPlayStart")) : n()
        },
        next: function(t) {
            var e = a.current;
            e && (u(t) || (t = e.direction.next),
            a.jumpto(e.index + 1, t, "next"))
        },
        prev: function(t) {
            var e = a.current;
            e && (u(t) || (t = e.direction.prev),
            a.jumpto(e.index - 1, t, "prev"))
        },
        jumpto: function(t, e, i) {
            var o = a.current;
            o && (t = f(t),
            a.direction = e || o.direction[t >= o.index ? "next" : "prev"],
            a.router = i || "jumpto",
            o.loop && (0 > t && (t = o.group.length + t % o.group.length),
            t %= o.group.length),
            o.group[t] !== n && (a.cancel(),
            a._start(t)))
        },
        reposition: function(t, e) {
            var n, o = a.current, s = o ? o.wrap : null;
            s && (n = a._getPosition(e),
            t && "scroll" === t.type ? (delete n.position,
            s.stop(!0, !0).animate(n, 200)) : (s.css(n),
            o.pos = i.extend({}, o.dim, n)))
        },
        update: function(t) {
            var e = t && t.originalEvent && t.originalEvent.type
              , i = !e || "orientationchange" === e;
            i && (clearTimeout(c),
            c = null),
            a.isOpen && !c && (c = setTimeout(function() {
                var n = a.current;
                n && !a.isClosing && (a.wrap.removeClass("fancybox-tmp"),
                (i || "load" === e || "resize" === e && n.autoResize) && a._setDimension(),
                "scroll" === e && n.canShrink || a.reposition(t),
                a.trigger("onUpdate"),
                c = null)
            }, i && !d ? 0 : 300))
        },
        toggle: function(t) {
            a.isOpen && (a.current.fitToView = "boolean" === i.type(t) ? t : !a.current.fitToView,
            d && (a.wrap.removeAttr("style").addClass("fancybox-tmp"),
            a.trigger("onUpdate")),
            a.update())
        },
        hideLoading: function() {
            r.unbind(".loading"),
            i("#fancybox-loading").remove()
        },
        showLoading: function() {
            var t, e;
            a.hideLoading(),
            t = i('<div id="fancybox-loading"><div></div></div>').click(a.cancel).appendTo("body"),
            r.bind("keydown.loading", function(t) {
                27 === (t.which || t.keyCode) && (t.preventDefault(),
                a.cancel())
            }),
            a.defaults.fixed || (e = a.getViewport(),
            t.css({
                position: "absolute",
                top: .5 * e.h + e.y,
                left: .5 * e.w + e.x
            })),
            a.trigger("onLoading")
        },
        getViewport: function() {
            var e = a.current && a.current.locked || !1
              , i = {
                x: s.scrollLeft(),
                y: s.scrollTop()
            };
            return e && e.length ? (i.w = e[0].clientWidth,
            i.h = e[0].clientHeight) : (i.w = d && t.innerWidth ? t.innerWidth : s.width(),
            i.h = d && t.innerHeight ? t.innerHeight : s.height()),
            i
        },
        unbindEvents: function() {
            a.wrap && p(a.wrap) && a.wrap.unbind(".fb"),
            r.unbind(".fb"),
            s.unbind(".fb")
        },
        bindEvents: function() {
            var t, e = a.current;
            e && (s.bind("orientationchange.fb" + (d ? "" : " resize.fb") + (e.autoCenter && !e.locked ? " scroll.fb" : ""), a.update),
            (t = e.keys) && r.bind("keydown.fb", function(o) {
                var s = o.which || o.keyCode
                  , r = o.target || o.srcElement;
                if (27 === s && a.coming)
                    return !1;
                o.ctrlKey || o.altKey || o.shiftKey || o.metaKey || r && (r.type || i(r).is("[contenteditable]")) || i.each(t, function(t, r) {
                    return 1 < e.group.length && r[s] !== n ? (a[t](r[s]),
                    o.preventDefault(),
                    !1) : -1 < i.inArray(s, r) ? (a[t](),
                    o.preventDefault(),
                    !1) : void 0
                })
            }),
            i.fn.mousewheel && e.mouseWheel && a.wrap.bind("mousewheel.fb", function(t, n, o, s) {
                for (var r = i(t.target || null), l = !1; r.length && !(l || r.is(".fancybox-skin") || r.is(".fancybox-wrap")); )
                    l = r[0] && !(r[0].style.overflow && "hidden" === r[0].style.overflow) && (r[0].clientWidth && r[0].scrollWidth > r[0].clientWidth || r[0].clientHeight && r[0].scrollHeight > r[0].clientHeight),
                    r = i(r).parent();
                0 !== n && !l && 1 < a.group.length && !e.canShrink && (0 < s || 0 < o ? a.prev(0 < s ? "down" : "left") : (0 > s || 0 > o) && a.next(0 > s ? "up" : "right"),
                t.preventDefault())
            }))
        },
        trigger: function(t, e) {
            var n, o = e || a.coming || a.current;
            if (o) {
                if (i.isFunction(o[t]) && (n = o[t].apply(o, Array.prototype.slice.call(arguments, 1))),
                !1 === n)
                    return !1;
                o.helpers && i.each(o.helpers, function(e, n) {
                    n && a.helpers[e] && i.isFunction(a.helpers[e][t]) && a.helpers[e][t](i.extend(!0, {}, a.helpers[e].defaults, n), o)
                })
            }
            r.trigger(t)
        },
        isImage: function(t) {
            return u(t) && t.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i)
        },
        isSWF: function(t) {
            return u(t) && t.match(/\.(swf)((\?|#).*)?$/i)
        },
        _start: function(t) {
            var e, n, o = {};
            if (t = f(t),
            !(e = a.group[t] || null))
                return !1;
            if (e = (o = i.extend(!0, {}, a.opts, e)).margin,
            n = o.padding,
            "number" === i.type(e) && (o.margin = [e, e, e, e]),
            "number" === i.type(n) && (o.padding = [n, n, n, n]),
            o.modal && i.extend(!0, o, {
                closeBtn: !1,
                closeClick: !1,
                nextClick: !1,
                arrows: !1,
                mouseWheel: !1,
                keys: null,
                helpers: {
                    overlay: {
                        closeClick: !1
                    }
                }
            }),
            o.autoSize && (o.autoWidth = o.autoHeight = !0),
            "auto" === o.width && (o.autoWidth = !0),
            "auto" === o.height && (o.autoHeight = !0),
            o.group = a.group,
            o.index = t,
            a.coming = o,
            !1 === a.trigger("beforeLoad"))
                a.coming = null;
            else {
                if (n = o.type,
                e = o.href,
                !n)
                    return a.coming = null,
                    !(!a.current || !a.router || "jumpto" === a.router) && (a.current.index = t,
                    a[a.router](a.direction));
                if (a.isActive = !0,
                "image" !== n && "swf" !== n || (o.autoHeight = o.autoWidth = !1,
                o.scrolling = "visible"),
                "image" === n && (o.aspectRatio = !0),
                "iframe" === n && d && (o.scrolling = "scroll"),
                o.wrap = i(o.tpl.wrap).addClass("fancybox-" + (d ? "mobile" : "desktop") + " fancybox-type-" + n + " fancybox-tmp " + o.wrapCSS).appendTo(o.parent || "body"),
                i.extend(o, {
                    skin: i(".fancybox-skin", o.wrap),
                    outer: i(".fancybox-outer", o.wrap),
                    inner: i(".fancybox-inner", o.wrap)
                }),
                i.each(["Top", "Right", "Bottom", "Left"], function(t, e) {
                    o.skin.css("padding" + e, m(o.padding[t]))
                }),
                a.trigger("onReady"),
                "inline" === n || "html" === n) {
                    if (!o.content || !o.content.length)
                        return a._error("content")
                } else if (!e)
                    return a._error("href");
                "image" === n ? a._loadImage() : "ajax" === n ? a._loadAjax() : "iframe" === n ? a._loadIframe() : a._afterLoad()
            }
        },
        _error: function(t) {
            i.extend(a.coming, {
                type: "html",
                autoWidth: !0,
                autoHeight: !0,
                minWidth: 0,
                minHeight: 0,
                scrolling: "no",
                hasError: t,
                content: a.coming.tpl.error
            }),
            a._afterLoad()
        },
        _loadImage: function() {
            var t = a.imgPreload = new Image;
            t.onload = function() {
                this.onload = this.onerror = null,
                a.coming.width = this.width / a.opts.pixelRatio,
                a.coming.height = this.height / a.opts.pixelRatio,
                a._afterLoad()
            }
            ,
            t.onerror = function() {
                this.onload = this.onerror = null,
                a._error("image")
            }
            ,
            t.src = a.coming.href,
            !0 !== t.complete && a.showLoading()
        },
        _loadAjax: function() {
            var t = a.coming;
            a.showLoading(),
            a.ajaxLoad = i.ajax(i.extend({}, t.ajax, {
                url: t.href,
                error: function(t, e) {
                    a.coming && "abort" !== e ? a._error("ajax", t) : a.hideLoading()
                },
                success: function(e, i) {
                    "success" === i && (t.content = e,
                    a._afterLoad())
                }
            }))
        },
        _loadIframe: function() {
            var t = a.coming
              , e = i(t.tpl.iframe.replace(/\{rnd\}/g, (new Date).getTime())).attr("scrolling", d ? "auto" : t.iframe.scrolling).attr("src", t.href);
            i(t.wrap).bind("onReset", function() {
                try {
                    i(this).find("iframe").hide().attr("src", "//about:blank").end().empty()
                } catch (t) {}
            }),
            t.iframe.preload && (a.showLoading(),
            e.one("load", function() {
                i(this).data("ready", 1),
                d || i(this).bind("load.fb", a.update),
                i(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show(),
                a._afterLoad()
            })),
            t.content = e.appendTo(t.inner),
            t.iframe.preload || a._afterLoad()
        },
        _preloadImages: function() {
            var t, e, i = a.group, n = a.current, o = i.length, s = n.preload ? Math.min(n.preload, o - 1) : 0;
            for (e = 1; e <= s; e += 1)
                "image" === (t = i[(n.index + e) % o]).type && t.href && ((new Image).src = t.href)
        },
        _afterLoad: function() {
            var t, e, n, o, s, r = a.coming, l = a.current;
            if (a.hideLoading(),
            r && !1 !== a.isActive)
                if (!1 === a.trigger("afterLoad", r, l))
                    r.wrap.stop(!0).trigger("onReset").remove(),
                    a.coming = null;
                else {
                    switch (l && (a.trigger("beforeChange", l),
                    l.wrap.stop(!0).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove()),
                    a.unbindEvents(),
                    t = r.content,
                    e = r.type,
                    n = r.scrolling,
                    i.extend(a, {
                        wrap: r.wrap,
                        skin: r.skin,
                        outer: r.outer,
                        inner: r.inner,
                        current: r,
                        previous: l
                    }),
                    o = r.href,
                    e) {
                    case "inline":
                    case "ajax":
                    case "html":
                        r.selector ? t = i("<div>").html(t).find(r.selector) : p(t) && (t.data("fancybox-placeholder") || t.data("fancybox-placeholder", i('<div class="fancybox-placeholder"></div>').insertAfter(t).hide()),
                        t = t.show().detach(),
                        r.wrap.bind("onReset", function() {
                            i(this).find(t).length && t.hide().replaceAll(t.data("fancybox-placeholder")).data("fancybox-placeholder", !1)
                        }));
                        break;
                    case "image":
                        t = r.tpl.image.replace(/\{href\}/g, o);
                        break;
                    case "swf":
                        t = '<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="' + o + '"></param>',
                        s = "",
                        i.each(r.swf, function(e, i) {
                            t += '<param name="' + e + '" value="' + i + '"></param>',
                            s += " " + e + '="' + i + '"'
                        }),
                        t += '<embed src="' + o + '" type="application/x-shockwave-flash" width="100%" height="100%"' + s + "></embed></object>"
                    }
                    p(t) && t.parent().is(r.inner) || r.inner.append(t),
                    a.trigger("beforeShow"),
                    r.inner.css("overflow", "yes" === n ? "scroll" : "no" === n ? "hidden" : n),
                    a._setDimension(),
                    a.reposition(),
                    a.isOpen = !1,
                    a.coming = null,
                    a.bindEvents(),
                    a.isOpened ? l.prevMethod && a.transitions[l.prevMethod]() : i(".fancybox-wrap").not(r.wrap).stop(!0).trigger("onReset").remove(),
                    a.transitions[a.isOpened ? r.nextMethod : r.openMethod](),
                    a._preloadImages()
                }
        },
        _setDimension: function() {
            var t, e, n, o, s, r, l, c, d, p = a.getViewport(), u = 0, g = !1, v = !1, y = (g = a.wrap,
            a.skin), b = a.inner, w = a.current, x = (v = w.width,
            w.height), T = w.minWidth, k = w.minHeight, C = w.maxWidth, S = w.maxHeight, $ = w.scrolling, E = w.scrollOutside ? w.scrollbarWidth : 0, I = w.margin, A = f(I[1] + I[3]), _ = f(I[0] + I[2]);
            if (g.add(y).add(b).width("auto").height("auto").removeClass("fancybox-tmp"),
            e = A + (I = f(y.outerWidth(!0) - y.width())),
            n = _ + (t = f(y.outerHeight(!0) - y.height())),
            o = h(v) ? (p.w - e) * f(v) / 100 : v,
            s = h(x) ? (p.h - n) * f(x) / 100 : x,
            "iframe" === w.type) {
                if (d = w.content,
                w.autoHeight && 1 === d.data("ready"))
                    try {
                        d[0].contentWindow.document.location && (b.width(o).height(9999),
                        r = d.contents().find("body"),
                        E && r.css("overflow-x", "hidden"),
                        s = r.outerHeight(!0))
                    } catch (t) {}
            } else
                (w.autoWidth || w.autoHeight) && (b.addClass("fancybox-tmp"),
                w.autoWidth || b.width(o),
                w.autoHeight || b.height(s),
                w.autoWidth && (o = b.width()),
                w.autoHeight && (s = b.height()),
                b.removeClass("fancybox-tmp"));
            if (v = f(o),
            x = f(s),
            c = o / s,
            T = f(h(T) ? f(T, "w") - e : T),
            C = f(h(C) ? f(C, "w") - e : C),
            k = f(h(k) ? f(k, "h") - n : k),
            r = C,
            l = S = f(h(S) ? f(S, "h") - n : S),
            w.fitToView && (C = Math.min(p.w - e, C),
            S = Math.min(p.h - n, S)),
            e = p.w - A,
            _ = p.h - _,
            w.aspectRatio ? (v > C && (x = f((v = C) / c)),
            x > S && (v = f((x = S) * c)),
            v < T && (x = f((v = T) / c)),
            x < k && (v = f((x = k) * c))) : (v = Math.max(T, Math.min(v, C)),
            w.autoHeight && "iframe" !== w.type && (b.width(v),
            x = b.height()),
            x = Math.max(k, Math.min(x, S))),
            w.fitToView)
                if (b.width(v).height(x),
                g.width(v + I),
                p = g.width(),
                A = g.height(),
                w.aspectRatio)
                    for (; (p > e || A > _) && v > T && x > k && !(19 < u++); )
                        x = Math.max(k, Math.min(S, x - 10)),
                        (v = f(x * c)) < T && (x = f((v = T) / c)),
                        v > C && (x = f((v = C) / c)),
                        b.width(v).height(x),
                        g.width(v + I),
                        p = g.width(),
                        A = g.height();
                else
                    v = Math.max(T, Math.min(v, v - (p - e))),
                    x = Math.max(k, Math.min(x, x - (A - _)));
            E && "auto" === $ && x < s && v + I + E < e && (v += E),
            b.width(v).height(x),
            g.width(v + I),
            p = g.width(),
            A = g.height(),
            g = (p > e || A > _) && v > T && x > k,
            v = w.aspectRatio ? v < r && x < l && v < o && x < s : (v < r || x < l) && (v < o || x < s),
            i.extend(w, {
                dim: {
                    width: m(p),
                    height: m(A)
                },
                origWidth: o,
                origHeight: s,
                canShrink: g,
                canExpand: v,
                wPadding: I,
                hPadding: t,
                wrapSpace: A - y.outerHeight(!0),
                skinSpace: y.height() - x
            }),
            !d && w.autoHeight && x > k && x < S && !v && b.height("auto")
        },
        _getPosition: function(t) {
            var e = a.current
              , i = a.getViewport()
              , n = e.margin
              , o = a.wrap.width() + n[1] + n[3]
              , s = a.wrap.height() + n[0] + n[2];
            n = {
                position: "absolute",
                top: n[0],
                left: n[3]
            };
            return e.autoCenter && e.fixed && !t && s <= i.h && o <= i.w ? n.position = "fixed" : e.locked || (n.top += i.y,
            n.left += i.x),
            n.top = m(Math.max(n.top, n.top + (i.h - s) * e.topRatio)),
            n.left = m(Math.max(n.left, n.left + (i.w - o) * e.leftRatio)),
            n
        },
        _afterZoomIn: function() {
            var t = a.current;
            t && (a.isOpen = a.isOpened = !0,
            a.wrap.css("overflow", "visible").addClass("fancybox-opened"),
            a.update(),
            (t.closeClick || t.nextClick && 1 < a.group.length) && a.inner.css("cursor", "pointer").bind("click.fb", function(e) {
                i(e.target).is("a") || i(e.target).parent().is("a") || (e.preventDefault(),
                a[t.closeClick ? "close" : "next"]())
            }),
            t.closeBtn && i(t.tpl.closeBtn).appendTo(a.skin).bind("click.fb", function(t) {
                t.preventDefault(),
                a.close()
            }),
            t.arrows && 1 < a.group.length && ((t.loop || 0 < t.index) && i(t.tpl.prev).appendTo(a.outer).bind("click.fb", a.prev),
            (t.loop || t.index < a.group.length - 1) && i(t.tpl.next).appendTo(a.outer).bind("click.fb", a.next)),
            a.trigger("afterShow"),
            t.loop || t.index !== t.group.length - 1 ? a.opts.autoPlay && !a.player.isActive && (a.opts.autoPlay = !1,
            a.play(!0)) : a.play(!1))
        },
        _afterZoomOut: function(t) {
            t = t || a.current,
            i(".fancybox-wrap").trigger("onReset").remove(),
            i.extend(a, {
                group: {},
                opts: {},
                router: !1,
                current: null,
                isActive: !1,
                isOpened: !1,
                isOpen: !1,
                isClosing: !1,
                wrap: null,
                skin: null,
                outer: null,
                inner: null
            }),
            a.trigger("afterClose", t)
        }
    }),
    a.transitions = {
        getOrigPosition: function() {
            var t = a.current
              , e = t.element
              , i = t.orig
              , n = {}
              , o = 50
              , s = 50
              , r = t.hPadding
              , l = t.wPadding
              , c = a.getViewport();
            return !i && t.isDom && e.is(":visible") && ((i = e.find("img:first")).length || (i = e)),
            p(i) ? (n = i.offset(),
            i.is("img") && (o = i.outerWidth(),
            s = i.outerHeight())) : (n.top = c.y + (c.h - s) * t.topRatio,
            n.left = c.x + (c.w - o) * t.leftRatio),
            ("fixed" === a.wrap.css("position") || t.locked) && (n.top -= c.y,
            n.left -= c.x),
            {
                top: m(n.top - r * t.topRatio),
                left: m(n.left - l * t.leftRatio),
                width: m(o + l),
                height: m(s + r)
            }
        },
        step: function(t, e) {
            var i, n, o = e.prop, s = (n = a.current).wrapSpace, r = n.skinSpace;
            "width" !== o && "height" !== o || (i = e.end === e.start ? 1 : (t - e.start) / (e.end - e.start),
            a.isClosing && (i = 1 - i),
            n = t - (n = "width" === o ? n.wPadding : n.hPadding),
            a.skin[o](f("width" === o ? n : n - s * i)),
            a.inner[o](f("width" === o ? n : n - s * i - r * i)))
        },
        zoomIn: function() {
            var t = a.current
              , e = t.pos
              , n = t.openEffect
              , o = "elastic" === n
              , s = i.extend({
                opacity: 1
            }, e);
            delete s.position,
            o ? (e = this.getOrigPosition(),
            t.openOpacity && (e.opacity = .1)) : "fade" === n && (e.opacity = .1),
            a.wrap.css(e).animate(s, {
                duration: "none" === n ? 0 : t.openSpeed,
                easing: t.openEasing,
                step: o ? this.step : null,
                complete: a._afterZoomIn
            })
        },
        zoomOut: function() {
            var t = a.current
              , e = t.closeEffect
              , i = "elastic" === e
              , n = {
                opacity: .1
            };
            i && (n = this.getOrigPosition(),
            t.closeOpacity && (n.opacity = .1)),
            a.wrap.animate(n, {
                duration: "none" === e ? 0 : t.closeSpeed,
                easing: t.closeEasing,
                step: i ? this.step : null,
                complete: a._afterZoomOut
            })
        },
        changeIn: function() {
            var t, e = a.current, i = e.nextEffect, n = e.pos, o = {
                opacity: 1
            }, s = a.direction;
            n.opacity = .1,
            "elastic" === i && (t = "down" === s || "up" === s ? "top" : "left",
            "down" === s || "right" === s ? (n[t] = m(f(n[t]) - 200),
            o[t] = "+=200px") : (n[t] = m(f(n[t]) + 200),
            o[t] = "-=200px")),
            "none" === i ? a._afterZoomIn() : a.wrap.css(n).animate(o, {
                duration: e.nextSpeed,
                easing: e.nextEasing,
                complete: a._afterZoomIn
            })
        },
        changeOut: function() {
            var t = a.previous
              , e = t.prevEffect
              , n = {
                opacity: .1
            }
              , o = a.direction;
            "elastic" === e && (n["down" === o || "up" === o ? "top" : "left"] = ("up" === o || "left" === o ? "-" : "+") + "=200px"),
            t.wrap.animate(n, {
                duration: "none" === e ? 0 : t.prevSpeed,
                easing: t.prevEasing,
                complete: function() {
                    i(this).trigger("onReset").remove()
                }
            })
        }
    },
    a.helpers.overlay = {
        defaults: {
            closeClick: !0,
            speedOut: 200,
            showEarly: !0,
            css: {},
            locked: !d,
            fixed: !0
        },
        overlay: null,
        fixed: !1,
        el: i("html"),
        create: function(t) {
            var e;
            t = i.extend({}, this.defaults, t),
            this.overlay && this.close(),
            e = a.coming ? a.coming.parent : t.parent,
            this.overlay = i('<div class="fancybox-overlay"></div>').appendTo(e && e.lenth ? e : "body"),
            this.fixed = !1,
            t.fixed && a.defaults.fixed && (this.overlay.addClass("fancybox-overlay-fixed"),
            this.fixed = !0)
        },
        open: function(t) {
            var e = this;
            t = i.extend({}, this.defaults, t),
            this.overlay ? this.overlay.unbind(".overlay").width("auto").height("auto") : this.create(t),
            this.fixed || (s.bind("resize.overlay", i.proxy(this.update, this)),
            this.update()),
            t.closeClick && this.overlay.bind("click.overlay", function(t) {
                if (i(t.target).hasClass("fancybox-overlay"))
                    return a.isActive ? a.close() : e.close(),
                    !1
            }),
            this.overlay.css(t.css).show()
        },
        close: function() {
            s.unbind("resize.overlay"),
            this.el.hasClass("fancybox-lock") && (i(".fancybox-margin").removeClass("fancybox-margin"),
            this.el.removeClass("fancybox-lock"),
            s.scrollTop(this.scrollV).scrollLeft(this.scrollH)),
            i(".fancybox-overlay").remove().hide(),
            i.extend(this, {
                overlay: null,
                fixed: !1
            })
        },
        update: function() {
            var t, i = "100%";
            this.overlay.width(i).height("100%"),
            l ? (t = Math.max(e.documentElement.offsetWidth, e.body.offsetWidth),
            r.width() > t && (i = r.width())) : r.width() > s.width() && (i = r.width()),
            this.overlay.width(i).height(r.height())
        },
        onReady: function(t, e) {
            var n = this.overlay;
            i(".fancybox-overlay").stop(!0, !0),
            n || this.create(t),
            t.locked && this.fixed && e.fixed && (e.locked = this.overlay.append(e.wrap),
            e.fixed = !1),
            !0 === t.showEarly && this.beforeShow.apply(this, arguments)
        },
        beforeShow: function(t, e) {
            e.locked && !this.el.hasClass("fancybox-lock") && (!1 !== this.fixPosition && i("*").filter(function() {
                return "fixed" === i(this).css("position") && !i(this).hasClass("fancybox-overlay") && !i(this).hasClass("fancybox-wrap")
            }).addClass("fancybox-margin"),
            this.el.addClass("fancybox-margin"),
            this.scrollV = s.scrollTop(),
            this.scrollH = s.scrollLeft(),
            this.el.addClass("fancybox-lock"),
            s.scrollTop(this.scrollV).scrollLeft(this.scrollH)),
            this.open(t)
        },
        onUpdate: function() {
            this.fixed || this.update()
        },
        afterClose: function(t) {
            this.overlay && !a.coming && this.overlay.fadeOut(t.speedOut, i.proxy(this.close, this))
        }
    },
    a.helpers.title = {
        defaults: {
            type: "float",
            position: "bottom"
        },
        beforeShow: function(t) {
            var e = a.current
              , n = e.title
              , o = t.type;
            if (i.isFunction(n) && (n = n.call(e.element, e)),
            u(n) && "" !== i.trim(n)) {
                switch (e = i('<div class="fancybox-title fancybox-title-' + o + '-wrap">' + n + "</div>"),
                o) {
                case "inside":
                    o = a.skin;
                    break;
                case "outside":
                    o = a.wrap;
                    break;
                case "over":
                    o = a.inner;
                    break;
                default:
                    o = a.skin,
                    e.appendTo("body"),
                    l && e.width(e.width()),
                    e.wrapInner('<span class="child"></span>'),
                    a.current.margin[2] += Math.abs(f(e.css("margin-bottom")))
                }
                e["top" === t.position ? "prependTo" : "appendTo"](o)
            }
        }
    },
    i.fn.fancybox = function(t) {
        var e, n = i(this), o = this.selector || "", s = function(s) {
            var r, l, c = i(this).blur(), d = e;
            s.ctrlKey || s.altKey || s.shiftKey || s.metaKey || c.is(".fancybox-wrap") || (r = t.groupAttr || "data-fancybox-group",
            (l = c.attr(r)) || (r = "rel",
            l = c.get(0)[r]),
            l && "" !== l && "nofollow" !== l && (d = (c = (c = o.length ? i(o) : n).filter("[" + r + '="' + l + '"]')).index(this)),
            t.index = d,
            !1 !== a.open(c, t) && s.preventDefault())
        };
        return e = (t = t || {}).index || 0,
        o && !1 !== t.live ? r.undelegate(o, "click.fb-start").delegate(o + ":not('.fancybox-item, .fancybox-nav')", "click.fb-start", s) : n.unbind("click.fb-start").bind("click.fb-start", s),
        this.filter("[data-fancybox-start=1]").trigger("click"),
        this
    }
    ,
    r.ready(function() {
        var e, s;
        i.scrollbarWidth === n && (i.scrollbarWidth = function() {
            var t = i('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body")
              , e = (e = t.children()).innerWidth() - e.height(99).innerWidth();
            return t.remove(),
            e
        }
        ),
        i.support.fixedPosition === n && (i.support.fixedPosition = function() {
            var t = i('<div style="position:fixed;top:20px;"></div>').appendTo("body")
              , e = 20 === t[0].offsetTop || 15 === t[0].offsetTop;
            return t.remove(),
            e
        }()),
        i.extend(a.defaults, {
            scrollbarWidth: i.scrollbarWidth(),
            fixed: i.support.fixedPosition,
            parent: i("body")
        }),
        e = i(t).width(),
        o.addClass("fancybox-lock-test"),
        s = i(t).width(),
        o.removeClass("fancybox-lock-test"),
        i("<style type='text/css'>.fancybox-margin{margin-right:" + (s - e) + "px;}</style>").appendTo("head")
    })
}(window, document, jQuery),
function(t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof exports ? t(require("jquery")) : t(jQuery)
}(function(t) {
    var e = {
        element: "body",
        position: null,
        type: "info",
        allow_dismiss: !0,
        newest_on_top: !1,
        showProgressbar: !1,
        placement: {
            from: "top",
            align: "right"
        },
        offset: 20,
        spacing: 10,
        z_index: 1031,
        delay: 5e3,
        timer: 1e3,
        url_target: "_blank",
        mouse_over: null,
        animate: {
            enter: "animated fadeInDown",
            exit: "animated fadeOutUp"
        },
        onShow: null,
        onShown: null,
        onClose: null,
        onClosed: null,
        icon_type: "class",
        template: '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">&times;</button><span data-notify="icon"></span> <span data-notify="title">{1}</span> <span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>'
    };
    function i(i, n, o) {
        n = {
            content: {
                message: "object" == typeof n ? n.message : n,
                title: n.title ? n.title : "",
                icon: n.icon ? n.icon : "",
                url: n.url ? n.url : "#",
                target: n.target ? n.target : "-"
            }
        };
        o = t.extend(!0, {}, n, o),
        this.settings = t.extend(!0, {}, e, o),
        this._defaults = e,
        "-" == this.settings.content.target && (this.settings.content.target = this.settings.url_target),
        this.animations = {
            start: "webkitAnimationStart oanimationstart MSAnimationStart animationstart",
            end: "webkitAnimationEnd oanimationend MSAnimationEnd animationend"
        },
        "number" == typeof this.settings.offset && (this.settings.offset = {
            x: this.settings.offset,
            y: this.settings.offset
        }),
        this.init()
    }
    String.format = function() {
        for (var t = arguments[0], e = 1; e < arguments.length; e++)
            t = t.replace(RegExp("\\{" + (e - 1) + "\\}", "gm"), arguments[e]);
        return t
    }
    ,
    t.extend(i.prototype, {
        init: function() {
            var t = this;
            this.buildNotify(),
            this.settings.content.icon && this.setIcon(),
            "#" != this.settings.content.url && this.styleURL(),
            this.placement(),
            this.bind(),
            this.notify = {
                $ele: this.$ele,
                update: function(e, i) {
                    var n = {};
                    for (var e in "string" == typeof e ? n[e] = i : n = e,
                    n)
                        switch (e) {
                        case "type":
                            this.$ele.removeClass("alert-" + t.settings.type),
                            this.$ele.find('[data-notify="progressbar"] > .progress-bar').removeClass("progress-bar-" + t.settings.type),
                            t.settings.type = n[e],
                            this.$ele.addClass("alert-" + n[e]).find('[data-notify="progressbar"] > .progress-bar').addClass("progress-bar-" + n[e]);
                            break;
                        case "icon":
                            var o = this.$ele.find('[data-notify="icon"]');
                            "class" == t.settings.icon_type.toLowerCase() ? o.removeClass(t.settings.content.icon).addClass(n[e]) : (o.is("img") || o.find("img"),
                            o.attr("src", n[e]));
                            break;
                        case "progress":
                            var s = t.settings.delay - t.settings.delay * (n[e] / 100);
                            this.$ele.data("notify-delay", s),
                            this.$ele.find('[data-notify="progressbar"] > div').attr("aria-valuenow", n[e]).css("width", n[e] + "%");
                            break;
                        case "url":
                            this.$ele.find('[data-notify="url"]').attr("href", n[e]);
                            break;
                        case "target":
                            this.$ele.find('[data-notify="url"]').attr("target", n[e]);
                            break;
                        default:
                            this.$ele.find('[data-notify="' + e + '"]').html(n[e])
                        }
                    var r = this.$ele.outerHeight() + parseInt(t.settings.spacing) + parseInt(t.settings.offset.y);
                    t.reposition(r)
                },
                close: function() {
                    t.close()
                }
            }
        },
        buildNotify: function() {
            var e = this.settings.content;
            this.$ele = t(String.format(this.settings.template, this.settings.type, e.title, e.message, e.url, e.target)),
            this.$ele.attr("data-notify-position", this.settings.placement.from + "-" + this.settings.placement.align),
            this.settings.allow_dismiss || this.$ele.find('[data-notify="dismiss"]').css("display", "none"),
            (this.settings.delay <= 0 && !this.settings.showProgressbar || !this.settings.showProgressbar) && this.$ele.find('[data-notify="progressbar"]').remove()
        },
        setIcon: function() {
            "class" == this.settings.icon_type.toLowerCase() ? this.$ele.find('[data-notify="icon"]').addClass(this.settings.content.icon) : this.$ele.find('[data-notify="icon"]').is("img") ? this.$ele.find('[data-notify="icon"]').attr("src", this.settings.content.icon) : this.$ele.find('[data-notify="icon"]').append('<img src="' + this.settings.content.icon + '" alt="Notify Icon" />')
        },
        styleURL: function() {
            this.$ele.find('[data-notify="url"]').css({
                backgroundImage: "url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)",
                height: "100%",
                left: "0px",
                position: "absolute",
                top: "0px",
                width: "100%",
                zIndex: this.settings.z_index + 1
            }),
            this.$ele.find('[data-notify="dismiss"]').css({
                position: "absolute",
                right: "10px",
                top: "5px",
                zIndex: this.settings.z_index + 2
            })
        },
        placement: function() {
            var e = this
              , i = this.settings.offset.y
              , n = {
                display: "inline-block",
                margin: "0px auto",
                position: this.settings.position ? this.settings.position : "body" === this.settings.element ? "fixed" : "absolute",
                transition: "all .5s ease-in-out",
                zIndex: this.settings.z_index
            }
              , o = !1
              , s = this.settings;
            switch (t('[data-notify-position="' + this.settings.placement.from + "-" + this.settings.placement.align + '"]:not([data-closing="true"])').each(function() {
                return i = Math.max(i, parseInt(t(this).css(s.placement.from)) + parseInt(t(this).outerHeight()) + parseInt(s.spacing))
            }),
            1 == this.settings.newest_on_top && (i = this.settings.offset.y),
            n[this.settings.placement.from] = i + "px",
            this.settings.placement.align) {
            case "left":
            case "right":
                n[this.settings.placement.align] = this.settings.offset.x + "px";
                break;
            case "center":
                n.left = 0,
                n.right = 0
            }
            this.$ele.css(n).addClass(this.settings.animate.enter),
            t.each(Array("webkit", "moz", "o", "ms", ""), function(t, i) {
                e.$ele[0].style[i + "AnimationIterationCount"] = 1
            }),
            t(this.settings.element).append(this.$ele),
            1 == this.settings.newest_on_top && (i = parseInt(i) + parseInt(this.settings.spacing) + this.$ele.outerHeight(),
            this.reposition(i)),
            t.isFunction(e.settings.onShow) && e.settings.onShow.call(this.$ele),
            this.$ele.one(this.animations.start, function(t) {
                o = !0
            }).one(this.animations.end, function(i) {
                t.isFunction(e.settings.onShown) && e.settings.onShown.call(this)
            }),
            setTimeout(function() {
                o || t.isFunction(e.settings.onShown) && e.settings.onShown.call(this)
            }, 600)
        },
        bind: function() {
            var e = this;
            if (this.$ele.find('[data-notify="dismiss"]').on("click", function() {
                e.close()
            }),
            this.$ele.mouseover(function(e) {
                t(this).data("data-hover", "true")
            }).mouseout(function(e) {
                t(this).data("data-hover", "false")
            }),
            this.$ele.data("data-hover", "false"),
            this.settings.delay > 0) {
                e.$ele.data("notify-delay", e.settings.delay);
                var i = setInterval(function() {
                    var t = parseInt(e.$ele.data("notify-delay")) - e.settings.timer;
                    if ("false" === e.$ele.data("data-hover") && "pause" == e.settings.mouse_over || "pause" != e.settings.mouse_over) {
                        var n = (e.settings.delay - t) / e.settings.delay * 100;
                        e.$ele.data("notify-delay", t),
                        e.$ele.find('[data-notify="progressbar"] > div').attr("aria-valuenow", n).css("width", n + "%")
                    }
                    t <= -e.settings.timer && (clearInterval(i),
                    e.close())
                }, e.settings.timer)
            }
        },
        close: function() {
            var e = this
              , i = parseInt(this.$ele.css(this.settings.placement.from))
              , n = !1;
            this.$ele.data("closing", "true").addClass(this.settings.animate.exit),
            e.reposition(i),
            t.isFunction(e.settings.onClose) && e.settings.onClose.call(this.$ele),
            this.$ele.one(this.animations.start, function(t) {
                n = !0
            }).one(this.animations.end, function(i) {
                t(this).remove(),
                t.isFunction(e.settings.onClosed) && e.settings.onClosed.call(this)
            }),
            setTimeout(function() {
                n || (e.$ele.remove(),
                e.settings.onClosed && e.settings.onClosed(e.$ele))
            }, 600)
        },
        reposition: function(e) {
            var i = this
              , n = '[data-notify-position="' + this.settings.placement.from + "-" + this.settings.placement.align + '"]:not([data-closing="true"])'
              , o = this.$ele.nextAll(n);
            1 == this.settings.newest_on_top && (o = this.$ele.prevAll(n)),
            o.each(function() {
                t(this).css(i.settings.placement.from, e),
                e = parseInt(e) + parseInt(i.settings.spacing) + t(this).outerHeight()
            })
        }
    }),
    t.notify = function(t, e) {
        return new i(this,t,e).notify
    }
    ,
    t.notifyDefaults = function(i) {
        return e = t.extend(!0, {}, e, i)
    }
    ,
    t.notifyClose = function(e) {
        void 0 === e || "all" == e ? t("[data-notify]").find('[data-notify="dismiss"]').trigger("click") : t('[data-notify-position="' + e + '"]').find('[data-notify="dismiss"]').trigger("click")
    }
});
