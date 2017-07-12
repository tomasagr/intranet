/* global describe, it */

var assert = require('assert')
var utils = require('./lib/utils')
var RRule = require('../')

var parse = utils.parse
var datetime = utils.datetime
var testRecurring = utils.testRecurring

describe('RRule', function () {
  // Enable additional toString() / fromString() tests
  // for each testRecurring().
  this.ctx.ALSO_TEST_STRING_FUNCTIONS = true

  // Enable additional toText() / fromText() tests
  // for each testRecurring().
  // Many of the tests fail because the conversion is only approximate,
  // but it gives an idea about how well or bad it converts.
  this.ctx.ALSO_TEST_NLP_FUNCTIONS = false

  // Thorough after()/before()/between() tests.
  // NOTE: can take a longer time.
  this.ctx.ALSO_TEST_BEFORE_AFTER_BETWEEN = true

  this.ctx.ALSO_TEST_SUBSECOND_PRECISION = true

  var texts = [
    ['Every day', 'FREQ=DAILY'],
    ['Every day at 10, 12 and 17', 'FREQ=DAILY;BYHOUR=10,12,17'],
    ['Every week', 'FREQ=WEEKLY'],
    ['Every hour', 'FREQ=HOURLY'],
    ['Every 4 hours', 'INTERVAL=4;FREQ=HOURLY'],
    ['Every week on Tuesday', 'FREQ=WEEKLY;BYDAY=TU'],
    ['Every week on Monday, Wednesday', 'FREQ=WEEKLY;BYDAY=MO,WE'],
    ['Every weekday', 'FREQ=WEEKLY;BYDAY=MO,TU,WE,TH,FR'],
    ['Every 2 weeks', 'INTERVAL=2;FREQ=WEEKLY'],
    ['Every month', 'FREQ=MONTHLY'],
    ['Every 6 months', 'INTERVAL=6;FREQ=MONTHLY'],
    ['Every year', 'FREQ=YEARLY'],
    ['Every month on the 4th', 'FREQ=MONTHLY;BYMONTHDAY=4'],
    ['Every month on the 4th last', 'FREQ=MONTHLY;BYMONTHDAY=-4'],
    ['Every month on the 3rd Tuesday', 'FREQ=MONTHLY;BYDAY=+3TU'],
    ['Every month on the 3rd last Tuesday', 'FREQ=MONTHLY;BYDAY=-3TU'],
    ['Every month on the last Monday', 'FREQ=MONTHLY;BYDAY=-1MO'],
    ['Every month on the 2nd last Friday', 'FREQ=MONTHLY;BYDAY=-2FR'],
    // This one will fail.
    // The text date should be treated as a floating one, but toString
    // always returns UTC dates.
    // ['Every week until January 1, 2007', 'FREQ=WEEKLY;UNTIL=20070101T000000Z'],
    ['Every week for 20 times', 'FREQ=WEEKLY;COUNT=20']
  ]

  it('fromText()', function () {
    texts.forEach(function (item) {
      var text = item[0]
      var string = item[1]
      assert.strictEqual(RRule.fromText(text).toString(), string, text + ' => ' + string)
    })
  })

  it('toText()', function () {
    texts.forEach(function (item) {
      var text = item[0]
      var string = item[1]
      assert.strictEqual(RRule.fromString(string).toText().toLowerCase(), text.toLowerCase(),
        string + ' => ' + text)
    })
  })

  it('fromString()', function () {
    var strings = [
      ['FREQ=WEEKLY;UNTIL=20100101T000000Z', 'FREQ=WEEKLY;UNTIL=20100101T000000Z'],

      // Parse also `date` but return `date-time`
      ['FREQ=WEEKLY;UNTIL=20100101', 'FREQ=WEEKLY;UNTIL=20100101T000000Z']
    ]
    strings.forEach(function (item) {
      var s = item[0]
      var s2 = item[1]
      assert.strictEqual(RRule.fromString(s).toString(), s2, s + ' => ' + s2)
    })
  })

  testRecurring('missing Feb 28 https://github.com/jakubroztocil/rrule/issues/21',
    new RRule({
      freq: RRule.MONTHLY,
      dtstart: new Date(2013, 0, 1),
      count: 3,
      bymonthday: [28]
    }),
    [
      new Date(2013, 0, 28),
      new Date(2013, 1, 28),
      new Date(2013, 2, 28)
    ]
  )

  // =============================================================================
    // The original `dateutil.rrule` test suite converted from Py to JS.
    // =============================================================================

  testRecurring('testBefore',
    {
      rrule: new RRule({
        freq: RRule.DAILY,
        dtstart: parse('19970902T090000')
      }),
      method: 'before',
      args: [parse('19970905T090000')]
    },
    datetime(1997, 9, 4, 9, 0)
  )

  testRecurring('testBeforeInc',
    {
      rrule: new RRule({
        freq: RRule.DAILY,
        dtstart: parse('19970902T090000')
      }),
      method: 'before',
      args: [parse('19970905T090000'), true]
    },
    datetime(1997, 9, 5, 9, 0)
  )

  testRecurring('testAfter',
    {
      rrule: new RRule({
        freq: RRule.DAILY,
        dtstart: parse('19970902T090000')
      }),
      method: 'after',
      args: [parse('19970904T090000')]
    },
    datetime(1997, 9, 5, 9, 0)
  )

  testRecurring('testAfterInc',
    {
      rrule: new RRule({
        freq: RRule.DAILY,
        dtstart: parse('19970902T090000')
      }),
      method: 'after',
      args: [parse('19970904T090000'), true]
    },
    datetime(1997, 9, 4, 9, 0)
  )

  testRecurring('testBetween',
    {
      rrule: new RRule({
        freq: RRule.DAILY,
        dtstart: parse('19970902T090000')
      }),
      method: 'between',
      args: [parse('19970902T090000'), parse('19970906T090000')]
    },
    [
      datetime(1997, 9, 3, 9, 0),
      datetime(1997, 9, 4, 9, 0),
      datetime(1997, 9, 5, 9, 0)
    ]
  )

  testRecurring('testBetweenInc',
    {
      rrule: new RRule({
        freq: RRule.DAILY,
        dtstart: parse('19970902T090000')
      }),
      method: 'between',
      args: [parse('19970902T090000'), parse('19970906T090000'), true]
    },
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 3, 9, 0),
      datetime(1997, 9, 4, 9, 0),
      datetime(1997, 9, 5, 9, 0),
      datetime(1997, 9, 6, 9, 0)
    ]
  )

  testRecurring('testYearly',
    new RRule({
      freq: RRule.YEARLY,
      count: 3,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1998, 9, 2, 9, 0),
      datetime(1999, 9, 2, 9, 0)
    ]
  )

  testRecurring('testYearlyInterval',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      interval: 2,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1999, 9, 2, 9, 0),
      datetime(2001, 9, 2, 9, 0)
    ]
  )

  testRecurring('testYearlyIntervalLarge',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      interval: 100,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(2097, 9, 2, 9, 0),
      datetime(2197, 9, 2, 9, 0)
    ]
  )

  testRecurring('testYearlyByMonth',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      bymonth: [1, 3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 2, 9, 0),
      datetime(1998, 3, 2, 9, 0),
      datetime(1999, 1, 2, 9, 0)
    ]
  )

  testRecurring('testYearlyByMonthDay',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      bymonthday: [1, 3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 3, 9, 0),
      datetime(1997, 10, 1, 9, 0),
      datetime(1997, 10, 3, 9, 0)
    ]
  )

  testRecurring('testYearlyByMonthAndMonthDay',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      bymonth: [1, 3],
      bymonthday: [5, 7],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 5, 9, 0),
      datetime(1998, 1, 7, 9, 0),
      datetime(1998, 3, 5, 9, 0)
    ]
  )

  testRecurring('testYearlyByWeekDay',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 4, 9, 0),
      datetime(1997, 9, 9, 9, 0)
    ]
  )

  testRecurring('testYearlyByNWeekDay',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byweekday: [RRule.TU.nth(1), RRule.TH.nth(-1)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 25, 9, 0),
      datetime(1998, 1, 6, 9, 0),
      datetime(1998, 12, 31, 9, 0)
    ]
  )

  testRecurring('testYearlyByNWeekDayLarge',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byweekday: [RRule.TU.nth(3), RRule.TH.nth(-3)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 11, 9, 0),
      datetime(1998, 1, 20, 9, 0),
      datetime(1998, 12, 17, 9, 0)
    ]
  )

  testRecurring('testYearlyByMonthAndWeekDay',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 1, 6, 9, 0),
      datetime(1998, 1, 8, 9, 0)
    ]
  )

  testRecurring('testYearlyByMonthAndNWeekDay',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU.nth(1), RRule.TH.nth(-1)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 6, 9, 0),
      datetime(1998, 1, 29, 9, 0),
      datetime(1998, 3, 3, 9, 0)
    ]
  )

  testRecurring('testYearlyByMonthAndNWeekDayLarge',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU.nth(3), RRule.TH.nth(-3)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 15, 9, 0),
      datetime(1998, 1, 20, 9, 0),
      datetime(1998, 3, 12, 9, 0)
    ]
  )

  testRecurring('testYearlyByMonthDayAndWeekDay',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      bymonthday: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 2, 3, 9, 0),
      datetime(1998, 3, 3, 9, 0)
    ]
  )

  testRecurring('testYearlyByMonthAndMonthDayAndWeekDay',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      bymonth: [1, 3],
      bymonthday: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 3, 3, 9, 0),
      datetime(2001, 3, 1, 9, 0)
    ]
  )

  testRecurring('testYearlyByYearDay',
    new RRule({freq: RRule.YEARLY,
      count: 4,
      byyearday: [1, 100, 200, 365],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 31, 9, 0),
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 4, 10, 9, 0),
      datetime(1998, 7, 19, 9, 0)
    ]
  )

  testRecurring('testYearlyByYearDayNeg',
    new RRule({freq: RRule.YEARLY,
      count: 4,
      byyearday: [-365, -266, -166, -1],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 31, 9, 0),
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 4, 10, 9, 0),
      datetime(1998, 7, 19, 9, 0)
    ]
  )

  testRecurring('testYearlyByMonthAndYearDay',
    new RRule({freq: RRule.YEARLY,
      count: 4,
      bymonth: [4, 7],
      byyearday: [1, 100, 200, 365],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 10, 9, 0),
      datetime(1998, 7, 19, 9, 0),
      datetime(1999, 4, 10, 9, 0),
      datetime(1999, 7, 19, 9, 0)
    ]
  )

  testRecurring('testYearlyByMonthAndYearDayNeg',
    new RRule({freq: RRule.YEARLY,
      count: 4,
      bymonth: [4, 7],
      byyearday: [-365, -266, -166, -1],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 10, 9, 0),
      datetime(1998, 7, 19, 9, 0),
      datetime(1999, 4, 10, 9, 0),
      datetime(1999, 7, 19, 9, 0)
    ]
  )

  testRecurring('testYearlyByWeekNo',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byweekno: 20,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 5, 11, 9, 0),
      datetime(1998, 5, 12, 9, 0),
      datetime(1998, 5, 13, 9, 0)
    ]
  )

  testRecurring('testYearlyByWeekNoAndWeekDay',
    // That's a nice one. The first days of week number one
    // may be in the last year.
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byweekno: 1,
      byweekday: RRule.MO,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 29, 9, 0),
      datetime(1999, 1, 4, 9, 0),
      datetime(2000, 1, 3, 9, 0)
    ]
  )

  testRecurring('testYearlyByWeekNoAndWeekDayLarge',
    // Another nice test. The last days of week number 52/53
    // may be in the next year.
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byweekno: 52,
      byweekday: RRule.SU,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 28, 9, 0),
      datetime(1998, 12, 27, 9, 0),
      datetime(2000, 1, 2, 9, 0)
    ]
  )

  testRecurring('testYearlyByWeekNoAndWeekDayLast',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byweekno: -1,
      byweekday: RRule.SU,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 28, 9, 0),
      datetime(1999, 1, 3, 9, 0),
      datetime(2000, 1, 2, 9, 0)
    ]
  )

  testRecurring('testYearlyByEaster',
    new RRule({ count: 3,
      byeaster: 0,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 12, 9, 0),
      datetime(1999, 4, 4, 9, 0),
      datetime(2000, 4, 23, 9, 0)
    ]
  )

  testRecurring('testYearlyByEasterPos',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byeaster: 1,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 13, 9, 0),
      datetime(1999, 4, 5, 9, 0),
      datetime(2000, 4, 24, 9, 0)
    ]
  )

  testRecurring('testYearlyByEasterNeg',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byeaster: -1,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 11, 9, 0),
      datetime(1999, 4, 3, 9, 0),
      datetime(2000, 4, 22, 9, 0)
    ]
  )

  testRecurring('testYearlyByWeekNoAndWeekDay53',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byweekno: 53,
      byweekday: RRule.MO,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 12, 28, 9, 0),
      datetime(2004, 12, 27, 9, 0),
      datetime(2009, 12, 28, 9, 0)
    ]
  )

  testRecurring('testYearlyByHour',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byhour: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 0),
      datetime(1998, 9, 2, 6, 0),
      datetime(1998, 9, 2, 18, 0)
    ]
  )

  testRecurring('testYearlyByMinute',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byminute: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 6),
      datetime(1997, 9, 2, 9, 18),
      datetime(1998, 9, 2, 9, 6)
    ]
  )

  testRecurring('testYearlyBySecond',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0, 6),
      datetime(1997, 9, 2, 9, 0, 18),
      datetime(1998, 9, 2, 9, 0, 6)
    ]
  )

  testRecurring('testYearlyByHourAndMinute',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byhour: [6, 18],
      byminute: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 6),
      datetime(1997, 9, 2, 18, 18),
      datetime(1998, 9, 2, 6, 6)
    ]
  )

  testRecurring('testYearlyByHourAndSecond',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byhour: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 0, 6),
      datetime(1997, 9, 2, 18, 0, 18),
      datetime(1998, 9, 2, 6, 0, 6)
    ]
  )

  testRecurring('testYearlyByMinuteAndSecond',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byminute: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 6, 6),
      datetime(1997, 9, 2, 9, 6, 18),
      datetime(1997, 9, 2, 9, 18, 6)
    ]
  )

  testRecurring('testYearlyByHourAndMinuteAndSecond',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      byhour: [6, 18],
      byminute: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 6, 6),
      datetime(1997, 9, 2, 18, 6, 18),
      datetime(1997, 9, 2, 18, 18, 6)
    ]
  )

  testRecurring('testYearlyBySetPos',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      bymonthday: 15,
      byhour: [6, 18],
      bysetpos: [3, -3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 11, 15, 18, 0),
      datetime(1998, 2, 15, 6, 0),
      datetime(1998, 11, 15, 18, 0)
    ]
  )

  testRecurring('testMonthly',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 10, 2, 9, 0),
      datetime(1997, 11, 2, 9, 0)
    ]
  )

  testRecurring('testMonthlyInterval',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      interval: 2,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 11, 2, 9, 0),
      datetime(1998, 1, 2, 9, 0)
    ]
  )

  testRecurring('testMonthlyIntervalLarge',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      interval: 18,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1999, 3, 2, 9, 0),
      datetime(2000, 9, 2, 9, 0)
    ]
  )

  testRecurring('testMonthlyByMonth',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      bymonth: [1, 3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 2, 9, 0),
      datetime(1998, 3, 2, 9, 0),
      datetime(1999, 1, 2, 9, 0)
    ]
  )

  testRecurring('testMonthlyByMonthDay',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      bymonthday: [1, 3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 3, 9, 0),
      datetime(1997, 10, 1, 9, 0),
      datetime(1997, 10, 3, 9, 0)
    ]
  )

  testRecurring('testMonthlyByMonthAndMonthDay',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      bymonth: [1, 3],
      bymonthday: [5, 7],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 5, 9, 0),
      datetime(1998, 1, 7, 9, 0),
      datetime(1998, 3, 5, 9, 0)
    ]
  )

  testRecurring('testMonthlyByWeekDay',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 4, 9, 0),
      datetime(1997, 9, 9, 9, 0)
    ]
  )

  testRecurring('testMonthlyByNWeekDay',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byweekday: [RRule.TU.nth(1), RRule.TH.nth(-1)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 25, 9, 0),
      datetime(1997, 10, 7, 9, 0)
    ]
  )

  testRecurring('testMonthlyByNWeekDayLarge',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byweekday: [RRule.TU.nth(3), RRule.TH.nth(-3)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 11, 9, 0),
      datetime(1997, 9, 16, 9, 0),
      datetime(1997, 10, 16, 9, 0)
    ]
  )

  testRecurring('testMonthlyByMonthAndWeekDay',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 1, 6, 9, 0),
      datetime(1998, 1, 8, 9, 0)
    ]
  )

  testRecurring('testMonthlyByMonthAndNWeekDay',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU.nth(1), RRule.TH.nth(-1)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 6, 9, 0),
      datetime(1998, 1, 29, 9, 0),
      datetime(1998, 3, 3, 9, 0)
    ]
  )

  testRecurring('testMonthlyByMonthAndNWeekDayLarge',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU.nth(3), RRule.TH.nth(-3)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 15, 9, 0),
      datetime(1998, 1, 20, 9, 0),
      datetime(1998, 3, 12, 9, 0)
    ]
  )

  testRecurring('testMonthlyByMonthDayAndWeekDay',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      bymonthday: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 2, 3, 9, 0),
      datetime(1998, 3, 3, 9, 0)
    ]
  )

  testRecurring('testMonthlyByMonthAndMonthDayAndWeekDay',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      bymonth: [1, 3],
      bymonthday: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 3, 3, 9, 0),
      datetime(2001, 3, 1, 9, 0)
    ]
  )

  testRecurring('testMonthlyByYearDay',
    new RRule({freq: RRule.MONTHLY,
      count: 4,
      byyearday: [1, 100, 200, 365],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 31, 9, 0),
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 4, 10, 9, 0),
      datetime(1998, 7, 19, 9, 0)
    ]
  )

  testRecurring('testMonthlyByYearDayNeg',
    new RRule({freq: RRule.MONTHLY,
      count: 4,
      byyearday: [-365, -266, -166, -1],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 31, 9, 0),
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 4, 10, 9, 0),
      datetime(1998, 7, 19, 9, 0)
    ]
  )

  testRecurring('testMonthlyByMonthAndYearDay',
    new RRule({freq: RRule.MONTHLY,
      count: 4,
      bymonth: [4, 7],
      byyearday: [1, 100, 200, 365],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 10, 9, 0),
      datetime(1998, 7, 19, 9, 0),
      datetime(1999, 4, 10, 9, 0),
      datetime(1999, 7, 19, 9, 0)
    ]
  )

  testRecurring('testMonthlyByMonthAndYearDayNeg',
    new RRule({freq: RRule.MONTHLY,
      count: 4,
      bymonth: [4, 7],
      byyearday: [-365, -266, -166, -1],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 10, 9, 0),
      datetime(1998, 7, 19, 9, 0),
      datetime(1999, 4, 10, 9, 0),
      datetime(1999, 7, 19, 9, 0)
    ]
  )

  testRecurring('testMonthlyByWeekNo',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byweekno: 20,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 5, 11, 9, 0),
      datetime(1998, 5, 12, 9, 0),
      datetime(1998, 5, 13, 9, 0)
    ]
  )

  testRecurring('testMonthlyByWeekNoAndWeekDay',
    // That's a nice one. The first days of week number one
    // may be in the last year.
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byweekno: 1,
      byweekday: RRule.MO,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 29, 9, 0),
      datetime(1999, 1, 4, 9, 0),
      datetime(2000, 1, 3, 9, 0)
    ]
  )

  testRecurring('testMonthlyByWeekNoAndWeekDayLarge',
    // Another nice test. The last days of week number 52/53
    // may be in the next year.
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byweekno: 52,
      byweekday: RRule.SU,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 28, 9, 0),
      datetime(1998, 12, 27, 9, 0),
      datetime(2000, 1, 2, 9, 0)
    ]
  )

  testRecurring('testMonthlyByWeekNoAndWeekDayLast',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byweekno: -1,
      byweekday: RRule.SU,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 28, 9, 0),
      datetime(1999, 1, 3, 9, 0),
      datetime(2000, 1, 2, 9, 0)
    ]
  )

  testRecurring('testMonthlyByWeekNoAndWeekDay53',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byweekno: 53,
      byweekday: RRule.MO,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 12, 28, 9, 0),
      datetime(2004, 12, 27, 9, 0),
      datetime(2009, 12, 28, 9, 0)
    ]
  )

  testRecurring('testMonthlyByEaster',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byeaster: 0,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 12, 9, 0),
      datetime(1999, 4, 4, 9, 0),
      datetime(2000, 4, 23, 9, 0)
    ]
  )

  testRecurring('testMonthlyByEasterPos',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byeaster: 1,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 13, 9, 0),
      datetime(1999, 4, 5, 9, 0),
      datetime(2000, 4, 24, 9, 0)
    ]
  )

  testRecurring('testMonthlyByEasterNeg',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byeaster: -1,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 11, 9, 0),
      datetime(1999, 4, 3, 9, 0),
      datetime(2000, 4, 22, 9, 0)
    ]
  )

  testRecurring('testMonthlyByHour',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byhour: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 0),
      datetime(1997, 10, 2, 6, 0),
      datetime(1997, 10, 2, 18, 0)
    ]
  )

  testRecurring('testMonthlyByMinute',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byminute: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 6),
      datetime(1997, 9, 2, 9, 18),
      datetime(1997, 10, 2, 9, 6)
    ]
  )

  testRecurring('testMonthlyBySecond',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0, 6),
      datetime(1997, 9, 2, 9, 0, 18),
      datetime(1997, 10, 2, 9, 0, 6)
    ]
  )

  testRecurring('testMonthlyByHourAndMinute',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byhour: [6, 18],
      byminute: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 6),
      datetime(1997, 9, 2, 18, 18),
      datetime(1997, 10, 2, 6, 6)
    ]
  )

  testRecurring('testMonthlyByHourAndSecond',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byhour: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 0, 6),
      datetime(1997, 9, 2, 18, 0, 18),
      datetime(1997, 10, 2, 6, 0, 6)
    ]
  )

  testRecurring('testMonthlyByMinuteAndSecond',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byminute: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 6, 6),
      datetime(1997, 9, 2, 9, 6, 18),
      datetime(1997, 9, 2, 9, 18, 6)
    ]
  )

  testRecurring('testMonthlyByHourAndMinuteAndSecond',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      byhour: [6, 18],
      byminute: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 6, 6),
      datetime(1997, 9, 2, 18, 6, 18),
      datetime(1997, 9, 2, 18, 18, 6)
    ]
  )

  testRecurring('testMonthlyBySetPos',
    new RRule({freq: RRule.MONTHLY,
      count: 3,
      bymonthday: [13, 17],
      byhour: [6, 18],
      bysetpos: [3, -3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 13, 18, 0),
      datetime(1997, 9, 17, 6, 0),
      datetime(1997, 10, 13, 18, 0)
    ]
  )

  testRecurring('testMonthlyNegByMonthDayJanFebForNonLeapYear',
    new RRule({freq: RRule.MONTHLY,
      count: 4,
      bymonthday: -1,
      dtstart: parse('20131201T0900000')
    }),
    [
      datetime(2013, 12, 31, 9, 0),
      datetime(2014, 1, 31, 9, 0),
      datetime(2014, 2, 28, 9, 0),
      datetime(2014, 3, 31, 9, 0)
    ]
  )

  testRecurring('testMonthlyNegByMonthDayJanFebForLeapYear',
    new RRule({freq: RRule.MONTHLY,
      count: 4,
      bymonthday: -1,
      dtstart: parse('20151201T0900000')
    }),
    [
      datetime(2015, 12, 31, 9, 0),
      datetime(2016, 1, 31, 9, 0),
      datetime(2016, 2, 29, 9, 0),
      datetime(2016, 3, 31, 9, 0)
    ]
  )

  testRecurring('testWeekly',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 9, 9, 0),
      datetime(1997, 9, 16, 9, 0)
    ]
  )

  testRecurring('testWeeklyInterval',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      interval: 2,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 16, 9, 0),
      datetime(1997, 9, 30, 9, 0)
    ]
  )

  testRecurring('testWeeklyIntervalLarge',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      interval: 20,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1998, 1, 20, 9, 0),
      datetime(1998, 6, 9, 9, 0)
    ]
  )

  testRecurring('testWeeklyByMonth',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      bymonth: [1, 3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 6, 9, 0),
      datetime(1998, 1, 13, 9, 0),
      datetime(1998, 1, 20, 9, 0)
    ]
  )

  testRecurring('testWeeklyByMonthDay',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      bymonthday: [1, 3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 3, 9, 0),
      datetime(1997, 10, 1, 9, 0),
      datetime(1997, 10, 3, 9, 0)
    ]
  )

  testRecurring('testWeeklyByMonthAndMonthDay',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      bymonth: [1, 3],
      bymonthday: [5, 7],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 5, 9, 0),
      datetime(1998, 1, 7, 9, 0),
      datetime(1998, 3, 5, 9, 0)
    ]
  )

  testRecurring('testWeeklyByWeekDay',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 4, 9, 0),
      datetime(1997, 9, 9, 9, 0)
    ]
  )

  testRecurring('testWeeklyByNWeekDay',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byweekday: [RRule.TU.nth(1), RRule.TH.nth(-1)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 4, 9, 0),
      datetime(1997, 9, 9, 9, 0)
    ]
  )

  testRecurring('testWeeklyByMonthAndWeekDay',
    // This test is interesting, because it crosses the year
    // boundary in a weekly period to find day '1' as a
    // valid recurrence.
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 1, 6, 9, 0),
      datetime(1998, 1, 8, 9, 0)
    ]
  )

  testRecurring('testWeeklyByMonthAndNWeekDay',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU.nth(1), RRule.TH.nth(-1)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 1, 6, 9, 0),
      datetime(1998, 1, 8, 9, 0)
    ]
  )

  testRecurring('testWeeklyByMonthDayAndWeekDay',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      bymonthday: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 2, 3, 9, 0),
      datetime(1998, 3, 3, 9, 0)
    ]
  )

  testRecurring('testWeeklyByMonthAndMonthDayAndWeekDay',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      bymonth: [1, 3],
      bymonthday: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 3, 3, 9, 0),
      datetime(2001, 3, 1, 9, 0)
    ]
  )

  testRecurring('testWeeklyByYearDay',
    new RRule({freq: RRule.WEEKLY,
      count: 4,
      byyearday: [1, 100, 200, 365],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 31, 9, 0),
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 4, 10, 9, 0),
      datetime(1998, 7, 19, 9, 0)
    ]
  )

  testRecurring('testWeeklyByYearDayNeg',
    new RRule({freq: RRule.WEEKLY,
      count: 4,
      byyearday: [-365, -266, -166, -1],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 31, 9, 0),
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 4, 10, 9, 0),
      datetime(1998, 7, 19, 9, 0)
    ]
  )

  testRecurring('testWeeklyByMonthAndYearDay',
    new RRule({freq: RRule.WEEKLY,
      count: 4,
      bymonth: [1, 7],
      byyearday: [1, 100, 200, 365],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 7, 19, 9, 0),
      datetime(1999, 1, 1, 9, 0),
      datetime(1999, 7, 19, 9, 0)
    ]
  )

  testRecurring('testWeeklyByMonthAndYearDayNeg',
    new RRule({freq: RRule.WEEKLY,
      count: 4,
      bymonth: [1, 7],
      byyearday: [-365, -266, -166, -1],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 7, 19, 9, 0),
      datetime(1999, 1, 1, 9, 0),
      datetime(1999, 7, 19, 9, 0)
    ]
  )

  testRecurring('testWeeklyByWeekNo',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byweekno: 20,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 5, 11, 9, 0),
      datetime(1998, 5, 12, 9, 0),
      datetime(1998, 5, 13, 9, 0)
    ]
  )

  testRecurring('testWeeklyByWeekNoAndWeekDay',
    // That's a nice one. The first days of week number one
    // may be in the last year.
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byweekno: 1,
      byweekday: RRule.MO,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 29, 9, 0),
      datetime(1999, 1, 4, 9, 0),
      datetime(2000, 1, 3, 9, 0)
    ]
  )

  testRecurring('testWeeklyByWeekNoAndWeekDayLarge',
    // Another nice test. The last days of week number 52/53
    // may be in the next year.
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byweekno: 52,
      byweekday: RRule.SU,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 28, 9, 0),
      datetime(1998, 12, 27, 9, 0),
      datetime(2000, 1, 2, 9, 0)
    ]
  )

  testRecurring('testWeeklyByWeekNoAndWeekDayLast',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byweekno: -1,
      byweekday: RRule.SU,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 28, 9, 0),
      datetime(1999, 1, 3, 9, 0),
      datetime(2000, 1, 2, 9, 0)
    ]
  )

  testRecurring('testWeeklyByWeekNoAndWeekDay53',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byweekno: 53,
      byweekday: RRule.MO,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 12, 28, 9, 0),
      datetime(2004, 12, 27, 9, 0),
      datetime(2009, 12, 28, 9, 0)
    ]
  )

  testRecurring('testWeeklyByEaster',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byeaster: 0,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 12, 9, 0),
      datetime(1999, 4, 4, 9, 0),
      datetime(2000, 4, 23, 9, 0)
    ]
  )

  testRecurring('testWeeklyByEasterPos',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byeaster: 1,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 13, 9, 0),
      datetime(1999, 4, 5, 9, 0),
      datetime(2000, 4, 24, 9, 0)
    ]
  )

  testRecurring('testWeeklyByEasterNeg',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byeaster: -1,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 11, 9, 0),
      datetime(1999, 4, 3, 9, 0),
      datetime(2000, 4, 22, 9, 0)
    ]
  )

  testRecurring('testWeeklyByHour',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byhour: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 0),
      datetime(1997, 9, 9, 6, 0),
      datetime(1997, 9, 9, 18, 0)
    ]
  )

  testRecurring('testWeeklyByMinute',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byminute: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 6),
      datetime(1997, 9, 2, 9, 18),
      datetime(1997, 9, 9, 9, 6)
    ]
  )

  testRecurring('testWeeklyBySecond',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0, 6),
      datetime(1997, 9, 2, 9, 0, 18),
      datetime(1997, 9, 9, 9, 0, 6)
    ]
  )

  testRecurring('testWeeklyByHourAndMinute',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byhour: [6, 18],
      byminute: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 6),
      datetime(1997, 9, 2, 18, 18),
      datetime(1997, 9, 9, 6, 6)
    ]
  )

  testRecurring('testWeeklyByHourAndSecond',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byhour: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 0, 6),
      datetime(1997, 9, 2, 18, 0, 18),
      datetime(1997, 9, 9, 6, 0, 6)
    ]
  )

  testRecurring('testWeeklyByMinuteAndSecond',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byminute: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 6, 6),
      datetime(1997, 9, 2, 9, 6, 18),
      datetime(1997, 9, 2, 9, 18, 6)
    ]
  )

  testRecurring('testWeeklyByHourAndMinuteAndSecond',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byhour: [6, 18],
      byminute: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 6, 6),
      datetime(1997, 9, 2, 18, 6, 18),
      datetime(1997, 9, 2, 18, 18, 6)
    ]
  )

  testRecurring('testWeeklyBySetPos',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      byweekday: [RRule.TU, RRule.TH],
      byhour: [6, 18],
      bysetpos: [3, -3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 0),
      datetime(1997, 9, 4, 6, 0),
      datetime(1997, 9, 9, 18, 0)
    ]
  )

  testRecurring('testDaily',
    new RRule({freq: RRule.DAILY,
      count: 3,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 3, 9, 0),
      datetime(1997, 9, 4, 9, 0)
    ]
  )

  testRecurring('testDailyInterval',
    new RRule({freq: RRule.DAILY,
      count: 3,
      interval: 2,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 4, 9, 0),
      datetime(1997, 9, 6, 9, 0)
    ]
  )

  testRecurring('testDailyIntervalLarge',
    new RRule({freq: RRule.DAILY,
      count: 3,
      interval: 92,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 12, 3, 9, 0),
      datetime(1998, 3, 5, 9, 0)
    ]
  )

  testRecurring('testDailyByMonth',
    new RRule({freq: RRule.DAILY,
      count: 3,
      bymonth: [1, 3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 1, 2, 9, 0),
      datetime(1998, 1, 3, 9, 0)
    ]
  )

  testRecurring('testDailyByMonthDay',
    new RRule({freq: RRule.DAILY,
      count: 3,
      bymonthday: [1, 3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 3, 9, 0),
      datetime(1997, 10, 1, 9, 0),
      datetime(1997, 10, 3, 9, 0)
    ]
  )

  testRecurring('testDailyByMonthAndMonthDay',
    new RRule({freq: RRule.DAILY,
      count: 3,
      bymonth: [1, 3],
      bymonthday: [5, 7],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 5, 9, 0),
      datetime(1998, 1, 7, 9, 0),
      datetime(1998, 3, 5, 9, 0)
    ]
  )

  testRecurring('testDailyByWeekDay',
    new RRule({freq: RRule.DAILY,
      count: 3,
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 4, 9, 0),
      datetime(1997, 9, 9, 9, 0)
    ]
  )

  testRecurring('testDailyByNWeekDay',
    new RRule({freq: RRule.DAILY,
      count: 3,
      byweekday: [RRule.TU.nth(1), RRule.TH.nth(-1)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 4, 9, 0),
      datetime(1997, 9, 9, 9, 0)
    ]
  )

  testRecurring('testDailyByMonthAndWeekDay',
    new RRule({freq: RRule.DAILY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 1, 6, 9, 0),
      datetime(1998, 1, 8, 9, 0)
    ]
  )

  testRecurring('testDailyByMonthAndNWeekDay',
    new RRule({freq: RRule.DAILY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU.nth(1), RRule.TH.nth(-1)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 1, 6, 9, 0),
      datetime(1998, 1, 8, 9, 0)
    ]
  )

  testRecurring('testDailyByMonthDayAndWeekDay',
    new RRule({freq: RRule.DAILY,
      count: 3,
      bymonthday: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 2, 3, 9, 0),
      datetime(1998, 3, 3, 9, 0)
    ]
  )

  testRecurring('testDailyByMonthAndMonthDayAndWeekDay',
    new RRule({freq: RRule.DAILY,
      count: 3,
      bymonth: [1, 3],
      bymonthday: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 3, 3, 9, 0),
      datetime(2001, 3, 1, 9, 0)
    ]
  )

  testRecurring('testDailyByYearDay',
    new RRule({freq: RRule.DAILY,
      count: 4,
      byyearday: [1, 100, 200, 365],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 31, 9, 0),
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 4, 10, 9, 0),
      datetime(1998, 7, 19, 9, 0)
    ]
  )

  testRecurring('testDailyByYearDayNeg',
    new RRule({freq: RRule.DAILY,
      count: 4,
      byyearday: [-365, -266, -166, -1],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 31, 9, 0),
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 4, 10, 9, 0),
      datetime(1998, 7, 19, 9, 0)
    ]
  )

  testRecurring('testDailyByMonthAndYearDay',
    new RRule({freq: RRule.DAILY,
      count: 4,
      bymonth: [1, 7],
      byyearday: [1, 100, 200, 365],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 7, 19, 9, 0),
      datetime(1999, 1, 1, 9, 0),
      datetime(1999, 7, 19, 9, 0)
    ]
  )

  testRecurring('testDailyByMonthAndYearDayNeg',
    new RRule({freq: RRule.DAILY,
      count: 4,
      bymonth: [1, 7],
      byyearday: [-365, -266, -166, -1],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 9, 0),
      datetime(1998, 7, 19, 9, 0),
      datetime(1999, 1, 1, 9, 0),
      datetime(1999, 7, 19, 9, 0)
    ]
  )

  testRecurring('testDailyByWeekNo',
    new RRule({freq: RRule.DAILY,
      count: 3,
      byweekno: 20,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 5, 11, 9, 0),
      datetime(1998, 5, 12, 9, 0),
      datetime(1998, 5, 13, 9, 0)
    ]
  )

  testRecurring('testDailyByWeekNoAndWeekDay',
    // That's a nice one. The first days of week number one
    // may be in the last year.
    new RRule({freq: RRule.DAILY,
      count: 3,
      byweekno: 1,
      byweekday: RRule.MO,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 29, 9, 0),
      datetime(1999, 1, 4, 9, 0),
      datetime(2000, 1, 3, 9, 0)
    ]
  )

  testRecurring('testDailyByWeekNoAndWeekDayLarge',
    // Another nice test. The last days of week number 52/53
    // may be in the next year.
    new RRule({freq: RRule.DAILY,
      count: 3,
      byweekno: 52,
      byweekday: RRule.SU,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 28, 9, 0),
      datetime(1998, 12, 27, 9, 0),
      datetime(2000, 1, 2, 9, 0)
    ]
  )

  testRecurring('testDailyByWeekNoAndWeekDayLast',
    new RRule({freq: RRule.DAILY,
      count: 3,
      byweekno: -1,
      byweekday: RRule.SU,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 28, 9, 0),
      datetime(1999, 1, 3, 9, 0),
      datetime(2000, 1, 2, 9, 0)
    ]
  )

  testRecurring('testDailyByWeekNoAndWeekDay53',
    new RRule({freq: RRule.DAILY,
      count: 3,
      byweekno: 53,
      byweekday: RRule.MO,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 12, 28, 9, 0),
      datetime(2004, 12, 27, 9, 0),
      datetime(2009, 12, 28, 9, 0)
    ]
  )

  testRecurring('testDailyByEaster',
    new RRule({freq: RRule.DAILY,
      count: 3,
      byeaster: 0,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 12, 9, 0),
      datetime(1999, 4, 4, 9, 0),
      datetime(2000, 4, 23, 9, 0)
    ]
  )

  testRecurring('testDailyByEasterPos',
    new RRule({freq: RRule.DAILY,
      count: 3,
      byeaster: 1,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 13, 9, 0),
      datetime(1999, 4, 5, 9, 0),
      datetime(2000, 4, 24, 9, 0)
    ]
  )

  testRecurring('testDailyByEasterNeg',
    new RRule({freq: RRule.DAILY,
      count: 3,
      byeaster: -1,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 11, 9, 0),
      datetime(1999, 4, 3, 9, 0),
      datetime(2000, 4, 22, 9, 0)
    ]
  )

  testRecurring('testDailyByHour',
    new RRule({freq: RRule.DAILY,
      count: 3,
      byhour: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 0),
      datetime(1997, 9, 3, 6, 0),
      datetime(1997, 9, 3, 18, 0)
    ]
  )

  testRecurring('testDailyByMinute',
    new RRule({freq: RRule.DAILY,
      count: 3,
      byminute: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 6),
      datetime(1997, 9, 2, 9, 18),
      datetime(1997, 9, 3, 9, 6)
    ]
  )

  testRecurring('testDailyBySecond',
    new RRule({freq: RRule.DAILY,
      count: 3,
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0, 6),
      datetime(1997, 9, 2, 9, 0, 18),
      datetime(1997, 9, 3, 9, 0, 6)
    ]
  )

  testRecurring('testDailyByHourAndMinute',
    new RRule({freq: RRule.DAILY,
      count: 3,
      byhour: [6, 18],
      byminute: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 6),
      datetime(1997, 9, 2, 18, 18),
      datetime(1997, 9, 3, 6, 6)
    ]
  )

  testRecurring('testDailyByHourAndSecond',
    new RRule({freq: RRule.DAILY,
      count: 3,
      byhour: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 0, 6),
      datetime(1997, 9, 2, 18, 0, 18),
      datetime(1997, 9, 3, 6, 0, 6)
    ]
  )

  testRecurring('testDailyByMinuteAndSecond',
    new RRule({freq: RRule.DAILY,
      count: 3,
      byminute: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 6, 6),
      datetime(1997, 9, 2, 9, 6, 18),
      datetime(1997, 9, 2, 9, 18, 6)
    ]
  )

  testRecurring('testDailyByHourAndMinuteAndSecond',
    new RRule({freq: RRule.DAILY,
      count: 3,
      byhour: [6, 18],
      byminute: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 6, 6),
      datetime(1997, 9, 2, 18, 6, 18),
      datetime(1997, 9, 2, 18, 18, 6)
    ]
  )

  testRecurring('testDailyBySetPos',
    new RRule({freq: RRule.DAILY,
      count: 3,
      byhour: [6, 18],
      byminute: [15, 45],
      bysetpos: [3, -3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 15),
      datetime(1997, 9, 3, 6, 45),
      datetime(1997, 9, 3, 18, 15)
    ]
  )

  testRecurring('testHourly',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 2, 10, 0),
      datetime(1997, 9, 2, 11, 0)
    ]
  )

  testRecurring('testHourlyInterval',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      interval: 2,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 2, 11, 0),
      datetime(1997, 9, 2, 13, 0)
    ]
  )

  testRecurring('testHourlyIntervalLarge',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      interval: 769,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 10, 4, 10, 0),
      datetime(1997, 11, 5, 11, 0)
    ]
  )

  testRecurring('testHourlyByMonth',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      bymonth: [1, 3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 0, 0),
      datetime(1998, 1, 1, 1, 0),
      datetime(1998, 1, 1, 2, 0)
    ]
  )

  testRecurring('testHourlyByMonthDay',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      bymonthday: [1, 3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 3, 0, 0),
      datetime(1997, 9, 3, 1, 0),
      datetime(1997, 9, 3, 2, 0)
    ]
  )

  testRecurring('testHourlyByMonthAndMonthDay',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      bymonth: [1, 3],
      bymonthday: [5, 7],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 5, 0, 0),
      datetime(1998, 1, 5, 1, 0),
      datetime(1998, 1, 5, 2, 0)
    ]
  )

  testRecurring('testHourlyByWeekDay',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 2, 10, 0),
      datetime(1997, 9, 2, 11, 0)
    ]
  )

  testRecurring('testHourlyByNWeekDay',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byweekday: [RRule.TU.nth(1), RRule.TH.nth(-1)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 2, 10, 0),
      datetime(1997, 9, 2, 11, 0)
    ]
  )

  testRecurring('testHourlyByMonthAndWeekDay',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 0, 0),
      datetime(1998, 1, 1, 1, 0),
      datetime(1998, 1, 1, 2, 0)
    ]
  )

  testRecurring('testHourlyByMonthAndNWeekDay',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU.nth(1), RRule.TH.nth(-1)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 0, 0),
      datetime(1998, 1, 1, 1, 0),
      datetime(1998, 1, 1, 2, 0)
    ]
  )

  testRecurring('testHourlyByMonthDayAndWeekDay',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      bymonthday: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 0, 0),
      datetime(1998, 1, 1, 1, 0),
      datetime(1998, 1, 1, 2, 0)
    ]
  )

  testRecurring('testHourlyByMonthAndMonthDayAndWeekDay',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      bymonth: [1, 3],
      bymonthday: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 0, 0),
      datetime(1998, 1, 1, 1, 0),
      datetime(1998, 1, 1, 2, 0)
    ]
  )

  testRecurring('testHourlyByYearDay',
    new RRule({freq: RRule.HOURLY,
      count: 4,
      byyearday: [1, 100, 200, 365],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 31, 0, 0),
      datetime(1997, 12, 31, 1, 0),
      datetime(1997, 12, 31, 2, 0),
      datetime(1997, 12, 31, 3, 0)
    ]
  )

  testRecurring('testHourlyByYearDayNeg',
    new RRule({freq: RRule.HOURLY,
      count: 4,
      byyearday: [-365, -266, -166, -1],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 31, 0, 0),
      datetime(1997, 12, 31, 1, 0),
      datetime(1997, 12, 31, 2, 0),
      datetime(1997, 12, 31, 3, 0)
    ]
  )

  testRecurring('testHourlyByMonthAndYearDay',
    new RRule({freq: RRule.HOURLY,
      count: 4,
      bymonth: [4, 7],
      byyearday: [1, 100, 200, 365],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 10, 0, 0),
      datetime(1998, 4, 10, 1, 0),
      datetime(1998, 4, 10, 2, 0),
      datetime(1998, 4, 10, 3, 0)
    ]
  )

  testRecurring('testHourlyByMonthAndYearDayNeg',
    new RRule({freq: RRule.HOURLY,
      count: 4,
      bymonth: [4, 7],
      byyearday: [-365, -266, -166, -1],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 10, 0, 0),
      datetime(1998, 4, 10, 1, 0),
      datetime(1998, 4, 10, 2, 0),
      datetime(1998, 4, 10, 3, 0)
    ]
  )

  testRecurring('testHourlyByWeekNo',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byweekno: 20,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 5, 11, 0, 0),
      datetime(1998, 5, 11, 1, 0),
      datetime(1998, 5, 11, 2, 0)
    ]
  )

  testRecurring('testHourlyByWeekNoAndWeekDay',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byweekno: 1,
      byweekday: RRule.MO,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 29, 0, 0),
      datetime(1997, 12, 29, 1, 0),
      datetime(1997, 12, 29, 2, 0)
    ]
  )

  testRecurring('testHourlyByWeekNoAndWeekDayLarge',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byweekno: 52,
      byweekday: RRule.SU,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 28, 0, 0),
      datetime(1997, 12, 28, 1, 0),
      datetime(1997, 12, 28, 2, 0)
    ]
  )

  testRecurring('testHourlyByWeekNoAndWeekDayLast',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byweekno: -1,
      byweekday: RRule.SU,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 28, 0, 0),
      datetime(1997, 12, 28, 1, 0),
      datetime(1997, 12, 28, 2, 0)
    ]
  )

  testRecurring('testHourlyByWeekNoAndWeekDay53',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byweekno: 53,
      byweekday: RRule.MO,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 12, 28, 0, 0),
      datetime(1998, 12, 28, 1, 0),
      datetime(1998, 12, 28, 2, 0)
    ]
  )

  testRecurring.skip('testHourlyByEaster',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byeaster: 0,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 12, 0, 0),
      datetime(1998, 4, 12, 1, 0),
      datetime(1998, 4, 12, 2, 0)
    ]
  )

  testRecurring.skip('testHourlyByEasterPos',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byeaster: 1,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 13, 0, 0),
      datetime(1998, 4, 13, 1, 0),
      datetime(1998, 4, 13, 2, 0)
    ]
  )

  testRecurring.skip('testHourlyByEasterNeg',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byeaster: -1,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 11, 0, 0),
      datetime(1998, 4, 11, 1, 0),
      datetime(1998, 4, 11, 2, 0)
    ]
  )

  testRecurring('testHourlyByHour',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byhour: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 0),
      datetime(1997, 9, 3, 6, 0),
      datetime(1997, 9, 3, 18, 0)
    ]
  )

  testRecurring('testHourlyByMinute',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byminute: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 6),
      datetime(1997, 9, 2, 9, 18),
      datetime(1997, 9, 2, 10, 6)
    ]
  )

  testRecurring('testHourlyBySecond',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0, 6),
      datetime(1997, 9, 2, 9, 0, 18),
      datetime(1997, 9, 2, 10, 0, 6)
    ]
  )

  testRecurring('testHourlyByHourAndMinute',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byhour: [6, 18],
      byminute: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 6),
      datetime(1997, 9, 2, 18, 18),
      datetime(1997, 9, 3, 6, 6)
    ]
  )

  testRecurring('testHourlyByHourAndSecond',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byhour: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 0, 6),
      datetime(1997, 9, 2, 18, 0, 18),
      datetime(1997, 9, 3, 6, 0, 6)
    ]
  )

  testRecurring('testHourlyByMinuteAndSecond',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byminute: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 6, 6),
      datetime(1997, 9, 2, 9, 6, 18),
      datetime(1997, 9, 2, 9, 18, 6)
    ]
  )

  testRecurring('testHourlyByHourAndMinuteAndSecond',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byhour: [6, 18],
      byminute: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 6, 6),
      datetime(1997, 9, 2, 18, 6, 18),
      datetime(1997, 9, 2, 18, 18, 6)
    ]
  )

  testRecurring('testHourlyBySetPos',
    new RRule({freq: RRule.HOURLY,
      count: 3,
      byminute: [15, 45],
      bysecond: [15, 45],
      bysetpos: [3, -3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 15, 45),
      datetime(1997, 9, 2, 9, 45, 15),
      datetime(1997, 9, 2, 10, 15, 45)
    ]
  )

  testRecurring('testMinutely',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 2, 9, 1),
      datetime(1997, 9, 2, 9, 2)
    ]
  )

  testRecurring('testMinutelyInterval',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      interval: 2,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 2, 9, 2),
      datetime(1997, 9, 2, 9, 4)
    ]
  )

  testRecurring('testMinutelyIntervalLarge',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      interval: 1501,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 3, 10, 1),
      datetime(1997, 9, 4, 11, 2)
    ]
  )

  testRecurring('testMinutelyByMonth',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      bymonth: [1, 3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 0, 0),
      datetime(1998, 1, 1, 0, 1),
      datetime(1998, 1, 1, 0, 2)
    ]
  )

  testRecurring('testMinutelyByMonthDay',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      bymonthday: [1, 3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 3, 0, 0),
      datetime(1997, 9, 3, 0, 1),
      datetime(1997, 9, 3, 0, 2)
    ]
  )

  testRecurring('testMinutelyByMonthAndMonthDay',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      bymonth: [1, 3],
      bymonthday: [5, 7],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 5, 0, 0),
      datetime(1998, 1, 5, 0, 1),
      datetime(1998, 1, 5, 0, 2)
    ]
  )

  testRecurring('testMinutelyByWeekDay',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 2, 9, 1),
      datetime(1997, 9, 2, 9, 2)
    ]
  )

  testRecurring('testMinutelyByNWeekDay',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byweekday: [RRule.TU.nth(1), RRule.TH.nth(-1)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 2, 9, 1),
      datetime(1997, 9, 2, 9, 2)
    ]
  )

  testRecurring('testMinutelyByMonthAndWeekDay',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 0, 0),
      datetime(1998, 1, 1, 0, 1),
      datetime(1998, 1, 1, 0, 2)
    ]
  )

  testRecurring('testMinutelyByMonthAndNWeekDay',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU.nth(1), RRule.TH.nth(-1)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 0, 0),
      datetime(1998, 1, 1, 0, 1),
      datetime(1998, 1, 1, 0, 2)
    ]
  )

  testRecurring('testMinutelyByMonthDayAndWeekDay',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      bymonthday: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 0, 0),
      datetime(1998, 1, 1, 0, 1),
      datetime(1998, 1, 1, 0, 2)
    ]
  )

  testRecurring('testMinutelyByMonthAndMonthDayAndWeekDay',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      bymonth: [1, 3],
      bymonthday: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 0, 0),
      datetime(1998, 1, 1, 0, 1),
      datetime(1998, 1, 1, 0, 2)
    ]
  )

  testRecurring('testMinutelyByYearDay',
    new RRule({freq: RRule.MINUTELY,
      count: 4,
      byyearday: [1, 100, 200, 365],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 31, 0, 0),
      datetime(1997, 12, 31, 0, 1),
      datetime(1997, 12, 31, 0, 2),
      datetime(1997, 12, 31, 0, 3)
    ]
  )

  testRecurring('testMinutelyByYearDayNeg',
    new RRule({freq: RRule.MINUTELY,
      count: 4,
      byyearday: [-365, -266, -166, -1],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 31, 0, 0),
      datetime(1997, 12, 31, 0, 1),
      datetime(1997, 12, 31, 0, 2),
      datetime(1997, 12, 31, 0, 3)
    ]
  )

  testRecurring('testMinutelyByMonthAndYearDay',
    new RRule({freq: RRule.MINUTELY,
      count: 4,
      bymonth: [4, 7],
      byyearday: [1, 100, 200, 365],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 10, 0, 0),
      datetime(1998, 4, 10, 0, 1),
      datetime(1998, 4, 10, 0, 2),
      datetime(1998, 4, 10, 0, 3)
    ]
  )

  testRecurring('testMinutelyByMonthAndYearDayNeg',
    new RRule({freq: RRule.MINUTELY,
      count: 4,
      bymonth: [4, 7],
      byyearday: [-365, -266, -166, -1],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 10, 0, 0),
      datetime(1998, 4, 10, 0, 1),
      datetime(1998, 4, 10, 0, 2),
      datetime(1998, 4, 10, 0, 3)
    ]
  )

  testRecurring('testMinutelyByWeekNo',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byweekno: 20,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 5, 11, 0, 0),
      datetime(1998, 5, 11, 0, 1),
      datetime(1998, 5, 11, 0, 2)
    ]
  )

  testRecurring('testMinutelyByWeekNoAndWeekDay',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byweekno: 1,
      byweekday: RRule.MO,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 29, 0, 0),
      datetime(1997, 12, 29, 0, 1),
      datetime(1997, 12, 29, 0, 2)
    ]
  )

  testRecurring('testMinutelyByWeekNoAndWeekDayLarge',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byweekno: 52,
      byweekday: RRule.SU,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 28, 0, 0),
      datetime(1997, 12, 28, 0, 1),
      datetime(1997, 12, 28, 0, 2)
    ]
  )

  testRecurring('testMinutelyByWeekNoAndWeekDayLast',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byweekno: -1,
      byweekday: RRule.SU,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 28, 0, 0),
      datetime(1997, 12, 28, 0, 1),
      datetime(1997, 12, 28, 0, 2)
    ]
  )

  testRecurring('testMinutelyByWeekNoAndWeekDay53',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byweekno: 53,
      byweekday: RRule.MO,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 12, 28, 0, 0),
      datetime(1998, 12, 28, 0, 1),
      datetime(1998, 12, 28, 0, 2)
    ]
  )

  testRecurring.skip('testMinutelyByEaster',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byeaster: 0,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 12, 0, 0),
      datetime(1998, 4, 12, 0, 1),
      datetime(1998, 4, 12, 0, 2)
    ]
  )

  testRecurring.skip('testMinutelyByEasterPos',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byeaster: 1,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 13, 0, 0),
      datetime(1998, 4, 13, 0, 1),
      datetime(1998, 4, 13, 0, 2)
    ]
  )

  testRecurring.skip('testMinutelyByEasterNeg',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byeaster: -1,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 11, 0, 0),
      datetime(1998, 4, 11, 0, 1),
      datetime(1998, 4, 11, 0, 2)
    ]
  )

  testRecurring('testMinutelyByHour',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byhour: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 0),
      datetime(1997, 9, 2, 18, 1),
      datetime(1997, 9, 2, 18, 2)
    ]
  )

  testRecurring('testMinutelyByMinute',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byminute: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 6),
      datetime(1997, 9, 2, 9, 18),
      datetime(1997, 9, 2, 10, 6)
    ]
  )

  testRecurring('testMinutelyBySecond',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0, 6),
      datetime(1997, 9, 2, 9, 0, 18),
      datetime(1997, 9, 2, 9, 1, 6)
    ]
  )

  testRecurring('testMinutelyByHourAndMinute',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byhour: [6, 18],
      byminute: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 6),
      datetime(1997, 9, 2, 18, 18),
      datetime(1997, 9, 3, 6, 6)
    ]
  )

  testRecurring('testMinutelyByHourAndSecond',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byhour: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 0, 6),
      datetime(1997, 9, 2, 18, 0, 18),
      datetime(1997, 9, 2, 18, 1, 6)
    ]
  )

  testRecurring('testMinutelyByMinuteAndSecond',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byminute: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 6, 6),
      datetime(1997, 9, 2, 9, 6, 18),
      datetime(1997, 9, 2, 9, 18, 6)
    ]
  )

  testRecurring('testMinutelyByHourAndMinuteAndSecond',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      byhour: [6, 18],
      byminute: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 6, 6),
      datetime(1997, 9, 2, 18, 6, 18),
      datetime(1997, 9, 2, 18, 18, 6)
    ]
  )

  testRecurring('testMinutelyBySetPos',
    new RRule({freq: RRule.MINUTELY,
      count: 3,
      bysecond: [15, 30, 45],
      bysetpos: [3, -3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0, 15),
      datetime(1997, 9, 2, 9, 0, 45),
      datetime(1997, 9, 2, 9, 1, 15)
    ]
  )

  testRecurring('testSecondly',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0, 0),
      datetime(1997, 9, 2, 9, 0, 1),
      datetime(1997, 9, 2, 9, 0, 2)
    ]
  )

  testRecurring('testSecondlyInterval',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      interval: 2,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0, 0),
      datetime(1997, 9, 2, 9, 0, 2),
      datetime(1997, 9, 2, 9, 0, 4)
    ]
  )

  testRecurring('testSecondlyIntervalLarge',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      interval: 90061,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0, 0),
      datetime(1997, 9, 3, 10, 1, 1),
      datetime(1997, 9, 4, 11, 2, 2)
    ]
  )

  testRecurring('testSecondlyByMonth',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      bymonth: [1, 3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 0, 0, 0),
      datetime(1998, 1, 1, 0, 0, 1),
      datetime(1998, 1, 1, 0, 0, 2)
    ]
  )

  testRecurring('testSecondlyByMonthDay',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      bymonthday: [1, 3],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 3, 0, 0, 0),
      datetime(1997, 9, 3, 0, 0, 1),
      datetime(1997, 9, 3, 0, 0, 2)
    ]
  )

  testRecurring('testSecondlyByMonthAndMonthDay',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      bymonth: [1, 3],
      bymonthday: [5, 7],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 5, 0, 0, 0),
      datetime(1998, 1, 5, 0, 0, 1),
      datetime(1998, 1, 5, 0, 0, 2)
    ]
  )

  testRecurring('testSecondlyByWeekDay',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0, 0),
      datetime(1997, 9, 2, 9, 0, 1),
      datetime(1997, 9, 2, 9, 0, 2)
    ]
  )

  testRecurring('testSecondlyByNWeekDay',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byweekday: [RRule.TU.nth(1), RRule.TH.nth(-1)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0, 0),
      datetime(1997, 9, 2, 9, 0, 1),
      datetime(1997, 9, 2, 9, 0, 2)
    ]
  )

  testRecurring('testSecondlyByMonthAndWeekDay',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 0, 0, 0),
      datetime(1998, 1, 1, 0, 0, 1),
      datetime(1998, 1, 1, 0, 0, 2)
    ]
  )

  testRecurring('testSecondlyByMonthAndNWeekDay',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      bymonth: [1, 3],
      byweekday: [RRule.TU.nth(1), RRule.TH.nth(-1)],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 0, 0, 0),
      datetime(1998, 1, 1, 0, 0, 1),
      datetime(1998, 1, 1, 0, 0, 2)
    ]
  )

  testRecurring('testSecondlyByMonthDayAndWeekDay',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      bymonthday: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 0, 0, 0),
      datetime(1998, 1, 1, 0, 0, 1),
      datetime(1998, 1, 1, 0, 0, 2)
    ]
  )

  testRecurring('testSecondlyByMonthAndMonthDayAndWeekDay',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      bymonth: [1, 3],
      bymonthday: [1, 3],
      byweekday: [RRule.TU, RRule.TH],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 1, 1, 0, 0, 0),
      datetime(1998, 1, 1, 0, 0, 1),
      datetime(1998, 1, 1, 0, 0, 2)
    ]
  )

  testRecurring('testSecondlyByYearDay',
    new RRule({freq: RRule.SECONDLY,
      count: 4,
      byyearday: [1, 100, 200, 365],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 31, 0, 0, 0),
      datetime(1997, 12, 31, 0, 0, 1),
      datetime(1997, 12, 31, 0, 0, 2),
      datetime(1997, 12, 31, 0, 0, 3)
    ]
  )

  testRecurring('testSecondlyByYearDayNeg',
    new RRule({freq: RRule.SECONDLY,
      count: 4,
      byyearday: [-365, -266, -166, -1],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 31, 0, 0, 0),
      datetime(1997, 12, 31, 0, 0, 1),
      datetime(1997, 12, 31, 0, 0, 2),
      datetime(1997, 12, 31, 0, 0, 3)
    ]
  )

  testRecurring('testSecondlyByMonthAndYearDay',
    new RRule({freq: RRule.SECONDLY,
      count: 4,
      bymonth: [4, 7],
      byyearday: [1, 100, 200, 365],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 10, 0, 0, 0),
      datetime(1998, 4, 10, 0, 0, 1),
      datetime(1998, 4, 10, 0, 0, 2),
      datetime(1998, 4, 10, 0, 0, 3)
    ]
  )

  testRecurring('testSecondlyByMonthAndYearDayNeg',
    new RRule({freq: RRule.SECONDLY,
      count: 4,
      bymonth: [4, 7],
      byyearday: [-365, -266, -166, -1],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 10, 0, 0, 0),
      datetime(1998, 4, 10, 0, 0, 1),
      datetime(1998, 4, 10, 0, 0, 2),
      datetime(1998, 4, 10, 0, 0, 3)
    ]
  )

  testRecurring('testSecondlyByWeekNo',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byweekno: 20,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 5, 11, 0, 0, 0),
      datetime(1998, 5, 11, 0, 0, 1),
      datetime(1998, 5, 11, 0, 0, 2)
    ]
  )

  testRecurring('testSecondlyByWeekNoAndWeekDay',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byweekno: 1,
      byweekday: RRule.MO,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 29, 0, 0, 0),
      datetime(1997, 12, 29, 0, 0, 1),
      datetime(1997, 12, 29, 0, 0, 2)
    ]
  )

  testRecurring('testSecondlyByWeekNoAndWeekDayLarge',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byweekno: 52,
      byweekday: RRule.SU,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 28, 0, 0, 0),
      datetime(1997, 12, 28, 0, 0, 1),
      datetime(1997, 12, 28, 0, 0, 2)
    ]
  )

  testRecurring('testSecondlyByWeekNoAndWeekDayLast',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byweekno: -1,
      byweekday: RRule.SU,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 12, 28, 0, 0, 0),
      datetime(1997, 12, 28, 0, 0, 1),
      datetime(1997, 12, 28, 0, 0, 2)
    ]
  )

  testRecurring('testSecondlyByWeekNoAndWeekDay53',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byweekno: 53,
      byweekday: RRule.MO,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 12, 28, 0, 0, 0),
      datetime(1998, 12, 28, 0, 0, 1),
      datetime(1998, 12, 28, 0, 0, 2)
    ]
  )

  testRecurring.skip('testSecondlyByEaster',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byeaster: 0,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 12, 0, 0, 0),
      datetime(1998, 4, 12, 0, 0, 1),
      datetime(1998, 4, 12, 0, 0, 2)
    ]
  )

  testRecurring.skip('testSecondlyByEasterPos',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byeaster: 1,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 13, 0, 0, 0),
      datetime(1998, 4, 13, 0, 0, 1),
      datetime(1998, 4, 13, 0, 0, 2)
    ]
  )

  testRecurring.skip('testSecondlyByEasterNeg',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byeaster: -1,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1998, 4, 11, 0, 0, 0),
      datetime(1998, 4, 11, 0, 0, 1),
      datetime(1998, 4, 11, 0, 0, 2)
    ]
  )

  testRecurring('testSecondlyByHour',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byhour: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 0, 0),
      datetime(1997, 9, 2, 18, 0, 1),
      datetime(1997, 9, 2, 18, 0, 2)
    ]
  )

  testRecurring('testSecondlyByMinute',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byminute: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 6, 0),
      datetime(1997, 9, 2, 9, 6, 1),
      datetime(1997, 9, 2, 9, 6, 2)
    ]
  )

  testRecurring('testSecondlyBySecond',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0, 6),
      datetime(1997, 9, 2, 9, 0, 18),
      datetime(1997, 9, 2, 9, 1, 6)
    ]
  )

  testRecurring('testSecondlyByHourAndMinute',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byhour: [6, 18],
      byminute: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 6, 0),
      datetime(1997, 9, 2, 18, 6, 1),
      datetime(1997, 9, 2, 18, 6, 2)
    ]
  )

  testRecurring('testSecondlyByHourAndSecond',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byhour: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 0, 6),
      datetime(1997, 9, 2, 18, 0, 18),
      datetime(1997, 9, 2, 18, 1, 6)
    ]
  )

  testRecurring('testSecondlyByMinuteAndSecond',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byminute: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 6, 6),
      datetime(1997, 9, 2, 9, 6, 18),
      datetime(1997, 9, 2, 9, 18, 6)
    ]
  )

  testRecurring('testSecondlyByHourAndMinuteAndSecond',
    new RRule({freq: RRule.SECONDLY,
      count: 3,
      byhour: [6, 18],
      byminute: [6, 18],
      bysecond: [6, 18],
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 18, 6, 6),
      datetime(1997, 9, 2, 18, 6, 18),
      datetime(1997, 9, 2, 18, 18, 6)
    ]
  )

  testRecurring('testUntilNotMatching',
    new RRule({freq: RRule.DAILY,
      count: 3,
      dtstart: parse('19970902T090000'),
      until: parse('19970905T080000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 3, 9, 0),
      datetime(1997, 9, 4, 9, 0)
    ]
  )

  testRecurring('testUntilMatching',
    new RRule({freq: RRule.DAILY,
      count: 3,
      dtstart: parse('19970902T090000'),
      until: parse('19970904T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 3, 9, 0),
      datetime(1997, 9, 4, 9, 0)
    ]
  )

  testRecurring('testUntilSingle',
    new RRule({freq: RRule.DAILY,
      count: 3,
      dtstart: parse('19970902T090000'),
      until: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0)
    ]
  )

  testRecurring('testUntilEmpty',
    new RRule({freq: RRule.DAILY,
      count: 3,
      dtstart: parse('19970902T090000'),
      until: parse('19970901T090000')
    }),
    []
  )

  testRecurring('testUntilWithDate',
    new RRule({freq: RRule.DAILY,
      count: 3,
      dtstart: parse('19970902T090000'),
      until: datetime(1997, 9, 5)
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 3, 9, 0),
      datetime(1997, 9, 4, 9, 0)
    ]
  )

  testRecurring('testWkStIntervalMO',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      interval: 2,
      byweekday: [RRule.TU, RRule.SU],
      wkst: RRule.MO,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 7, 9, 0),
      datetime(1997, 9, 16, 9, 0)
    ]
  )

  testRecurring('testWkStIntervalSU',
    new RRule({freq: RRule.WEEKLY,
      count: 3,
      interval: 2,
      byweekday: [RRule.TU, RRule.SU],
      wkst: RRule.SU,
      dtstart: parse('19970902T090000')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 14, 9, 0),
      datetime(1997, 9, 16, 9, 0)
    ]
  )

  testRecurring('testDTStartIsDate',
    new RRule({freq: RRule.DAILY,
      count: 3,
      dtstart: datetime(1997, 9, 2)
    }),
    [
      datetime(1997, 9, 2, 0, 0),
      datetime(1997, 9, 3, 0, 0),
      datetime(1997, 9, 4, 0, 0)
    ]
  )

  testRecurring('testDTStartWithMicroseconds',
    new RRule({freq: RRule.DAILY,
      count: 3,
      dtstart: parse('19970902T090000.5')
    }),
    [
      datetime(1997, 9, 2, 9, 0),
      datetime(1997, 9, 3, 9, 0),
      datetime(1997, 9, 4, 9, 0)
    ]
  )

  testRecurring('testMaxYear',
    new RRule({freq: RRule.YEARLY,
      count: 3,
      bymonth: 2,
      bymonthday: 31,
      dtstart: parse('99970902T090000')
    }),
    []
  )

  testRecurring('testSubsecondStartYearly',
    new RRule({
      freq: RRule.YEARLY,
      count: 1,
      dtstart: new Date(1420063200001)
    }),
    [
      new Date(1420063200001)
    ]
  )

  testRecurring('testSubsecondStartMonthlyByMonthDay',
    new RRule({
      freq: RRule.MONTHLY,
      count: 1,
      bysetpos: [-1, 1],
      dtstart: new Date(1356991200001)
    }),
    [
      new Date(1356991200001)
    ]
  )

  it('testAfterBefore', function () {
    'YEARLY,MONTHLY,DAILY,HOURLY,MINUTELY,SECONDLY'.split(',').forEach(function (freq_str) {
      var date = new Date(1356991200001)
      var rr = new RRule({
        freq: RRule[freq_str],
        dtstart: date
      })

      assert.strictEqual(date.getTime(), rr.options.dtstart.getTime(),
        'the supplied dtstart differs from RRule.options.dtstart')
      var res = rr.before(rr.after(rr.options.dtstart))

      if (res != null) res = res.getTime()
      assert.strictEqual(res, rr.options.dtstart.getTime(),
        'after dtstart , followed by before does not return dtstart')
    })
  })
})
