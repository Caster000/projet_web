/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('voter', {
    'id_activite': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      comment: "null",
      references: {
        model: 'activite',
        key: 'id_activite'
      }
    },
    'id_personne': {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      comment: "null",
      references: {
        model: 'personne',
        key: 'id_personne'
      }
    }
  }, {
    tableName: 'voter'
  });
};
