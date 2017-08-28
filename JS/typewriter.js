function Typewriter (element) {
    this._characterCallback = null;
    this._completionCallback = null;

    if (typeof jQuery != 'undefined' && element instanceof jQuery) {
        element = element[0];
    }

    this._textNode = null;

    for (var i = 0; i < element.childNodes.length; i++) {
        if (element.childNodes[i].nodeType == 3) {
            _textNode = element.childNodes[i];
            break;
        }
    }

    if (!this._textNode) {
        this._textNode = document.createTextNode("");
        element.appendChild(this._textNode);
    }

    this._caretElement = document.createElement("span");
    this._caretTextNode = document.createTextNode("");
    this._caretElement.appendChild(this._caretTextNode);
    element.appendChild(this._caretElement);

    this.setCaret("|");
    this.setCaretPeriod(1000);

    this.setDelay(250, 100);
}

Typewriter.prototype.playSequence = function (sequence) {
    this._playSequenceAtIndex(sequence, 0);
}

Typewriter.prototype.setCaret = function (character) {
    this._caretTextNode.nodeValue = character;
}

Typewriter.prototype.setCaretPeriod = function (period) {
    var that = this;

    if (this._caretInterval) {
        clearInterval(this._caretInterval);
    }

    if (period) {
        this._caretInterval = setInterval(function () {
            if (that._caretElement.style.display == "none") {
                that._caretElement.style.display = "";
            } else {
                that._caretElement.style.display = "none";
            }
        }, period);
    } else {
        that._caretElement.style.display = "";
    }
}

Typewriter.prototype.setCharacterCallback = function (callback) {
    this._characterCallback = callback;
}

Typewriter.prototype.setCompletionCallback = function (callback) {
    this._completionCallback = callback;
}

Typewriter.prototype.setDelay = function (mean, variance) {
    this._delayMean = mean;
    this._delayVariance = variance;
}

Typewriter.prototype.typeText = function (text, instant) {
    if (typeof instant === 'undefined') {
        instant = false;
    }

    if (instant || this._delayMean == 0) {
        this._textNode.nodeValue += text;

        if (this._completionCallback) {
            this._completionCallback();
        }
    } else {
        this._typeTextAtIndex(text, 0);
    }
}

Typewriter.prototype._playSequenceAtIndex = function (sequence, index) {
    var that = this;

    if (index == sequence.length) {
        return;
    }

    var currentItem = sequence[index];

    var delayAfter = currentItem.delayAfter || 0;

    this.setCompletionCallback(function () {
        if (currentItem.callback) {
            currentItem.callback();
        }

        setTimeout(function () {that._playSequenceAtIndex(sequence, index + 1)}, delayAfter);
    });

    this.typeText(currentItem.text, currentItem.instant);
}

Typewriter.prototype._sampleDelay = function () {
    var lower_bound = this._delayMean - this._delayVariance;
    var range = this._delayVariance * 2;

    return Math.floor(Math.random() * range + lower_bound);
}

Typewriter.prototype._typeTextAtIndex = function (text, index) {
    var that = this;

    if (index == text.length) {
        if (this._completionCallback) {
            this._completionCallback();
        }
        return;
    }

    var character = text.charAt(index);

    if (character === "\b") {
        var newLength = this._textNode.nodeValue.length - 1;
        this._textNode.nodeValue = this._textNode.nodeValue.substring(0, newLength);
    } else {
        this._textNode.nodeValue += text[index];
    }

    if (this._characterCallback) {
        this._characterCallback(character);
    }
    
    setTimeout(
        function () {
            that._typeTextAtIndex(text, index + 1);
        },
        this._sampleDelay()
    );
}