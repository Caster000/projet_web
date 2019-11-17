/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('campus', {
    'id_campus': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      primaryKey: true,
      comment: "null",
      autoIncrement: true
    },
    'campus': {
      type: DataTypes.STRING(254),
      allowNull: false,
      comment: "null"
    }
  }, {
    tableName: 'campus'
  });
};
