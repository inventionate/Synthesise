jest.dontMock('../../resources/assets/js/Test.js');

describe('Test', () =>
{

    it('Concats two strings.', () =>
    {
        var Monja = require('../../resources/assets/js/Test.js');

        var Fabian = new Monja("Hello","Cutie");

        expect(Fabian.info()).toBe("Hello Cutie");
    });

});
